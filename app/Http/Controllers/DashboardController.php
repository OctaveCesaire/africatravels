<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Log;
use App\Models\Service;
use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\AlertMail;

class DashboardController extends Controller
{
    public function index()
    {
        $roles = Auth::user();
        $user = DB::table('roles')->where('id', $roles->role_id)->first();

        if ($user->display_name === 'Administrator') {
            return $this->adminDashboard();
        } elseif ($user->display_name === 'Tourism Agency') {
            return $this->agencyDashboard();
        } else {
            return $this->userDashboard();
        }
    }

    // Dashboard for regular users
    private function userDashboard()
    {
        $transactions = Transaction::where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('dashboard.user', [
            'transactions' => $transactions,
        ]);
    }

    // Dashboard for tourism agencies
    private function agencyDashboard()
    {
        $services = Service::filterByAgency(Auth::id())
            ->latest()
            ->paginate(10);

        $events = Event::where('created_by', Auth::id())
            ->latest()
            ->paginate(10);

        return view('dashboard.agency', [
            'services' => $services,
            'events' => $events,
        ]);
    }

    // Dashboard for administrators
    private function adminDashboard()
    {
        $logs = Log::latest()->paginate(10);
        $userCount = User::count();
        $transactionStats = Transaction::selectRaw('status, COUNT(*) as count')
        ->groupBy('status')
        ->get();

        //$this->sendAlerts($logs);

        // Ajout des graphiques pour les transactions
        $chartData = $transactionStats->map(function ($stat) {
            return ['label' => $stat->status, 'value' => $stat->count];
        });

        return view('dashboard.admin', [
            'logs' => $logs,
            'userCount' => $userCount,
            'transactionStats' => $transactionStats,
            'chartData' => $chartData, // Pour affichage graphique
        ]);
    }

   /*// Send email alerts for suspicious activities
    private function sendAlerts($logs)
    {
        foreach ($logs as $log) {
            if ($this->isSuspicious($log)) {
                Mail::to(config('admin.email'))->send(new AlertMail($log));
            }
        }
    }

    // Check for suspicious activities in logs
    private function isSuspicious($log)
    {
        return in_array($log->action, [
            'Failed Login Attempt',
            'Access to Nonexistent File',
            'Suspicious Behavior',
        ]);
    }*/

    // Méthode pour gérer les paiements
    public function processPayment(Request $request)
    {
        // Exemple d'intégration avec Stripe
        $response = Http::post('https://api.stripe.com/v1/payment_intents', [
            'amount' => $request->amount,
            'currency' => 'usd',
            'payment_method' => $request->payment_method,
            'confirm' => true,
        ]);

        if ($response->successful()) {
            Transaction::create([
                'user_id' => Auth::id(),
                'amount' => $request->amount,
                'status' => 'Completed',
                'transaction_id' => $response['id'],
                'description' => $request->description,
            ]);

            return redirect()->back()->with('success', 'Payment successful!');
        } else {
            return redirect()->back()->with('error', 'Payment failed.');
        }
    }

    // Méthode pour envoyer des alertes d'activité suspecte
    public function logSecurityAlert($message)
    {
        // Enregistrement dans les logs
        Log::create([
            'type' => 'security',
            'message' => $message,
        ]);

        // Envoi de l'alerte par e-mail
        SendAdminAlertJob::dispatch($message);

        return response()->json(['message' => 'Alert logged and e-mail sent.']);
    }
}