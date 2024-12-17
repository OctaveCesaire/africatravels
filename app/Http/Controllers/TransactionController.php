<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Event;
use Stripe\Stripe;
use Stripe\Charge;

class TransactionController extends Controller
{
    // Affiche l'historique des transactions
    public function index()
    {
        $transactions = Transaction::where('user_id', auth()->id())->latest()->get();

        return view('dashboard.transactions', compact('transactions'));
    }

    // Réserve un billet pour un événement
    public function bookEvent(Request $request, $eventId)
    {
        $event = Event::findOrFail($eventId);

        $transaction = Transaction::create([
            'user_id' => auth()->id(),
            'event_id' => $event->id,
            'amount' => $event->price,
            'status' => 'pending',
        ]);

        return redirect()->route('transaction.payment', $transaction->id);
    }

    // Affiche la page de paiement
    public function showPaymentPage($transactionId)
    {
        $transaction = Transaction::findOrFail($transactionId);

        return view('dashboard.payment', compact('transaction'));
    }

    // Processus de paiement avec Stripe
    public function processPayment(Request $request, $transactionId)
    {
        $transaction = Transaction::findOrFail($transactionId);

        $request->validate([
            'stripeToken' => 'required|string',
        ]);

        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));

            Charge::create([
                'amount' => $transaction->amount * 100, // en cents
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => "Payment for Event ID {$transaction->event_id}",
            ]);

            $transaction->update(['status' => 'completed']);

            return redirect()->route('dashboard.transactions')->with('success', 'Paiement réussi !');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Le paiement a échoué. Veuillez réessayer.']);
        }
    }
}

