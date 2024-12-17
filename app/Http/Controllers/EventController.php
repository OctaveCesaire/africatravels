<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * Affiche la liste des événements.
     */
    public function index(Request $request)
    {
        // Application de filtres (si nécessaire)
        $query = Event::query();

        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('date', [$request->start_date, $request->end_date]);
        }

        $events = $query->paginate(10);

        return view('pages.events', compact('events'));
    }

    /**
     * Affiche les détails d'un événement.
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);

        // Récupérer les avis associés (si nécessaire)
        $reviews = $event->reviews()->latest()->limit(5)->get();

        return view('pages.event-details', compact('event', 'reviews'));
    }
}
