<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agency;

class AgencyController extends Controller
{
    /**
     * Affiche la liste des agences de tourisme.
     */
    public function index(Request $request)
    {
        // Application de filtres (si nécessaire)
        $query = Agency::query();

        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $agencies = $query->paginate(10);

        return view('pages.agencies', compact('agencies'));
    }

    /**
     * Affiche les détails d'une agence.
     */
    public function show($id)
    {
        $agency = Agency::findOrFail($id);

        // Récupérer les avis associés (si nécessaire)
        $reviews = $agency->reviews()->latest()->limit(5)->get();

        return view('pages.agency-details', compact('agency', 'reviews'));
    }
}
