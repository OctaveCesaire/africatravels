<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TouristSite;
use App\Models\Review;

class TouristSiteController extends Controller
{
    // Affiche la liste des sites touristiques avec filtres
    public function index(Request $request)
    {
        $query = TouristSite::query();

        // Application des filtres
        if ($request->filled('name')) {
            $query->where('title', 'LIKE', '%' . $request->name . '%');
        }

        if ($request->filled('location')) {
            $query->where('location', 'LIKE', '%' . $request->location . '%');
        }

        $sites = $query->paginate(9);

        return view('pages.tourist-sites', compact('sites'));
    }

    // Affiche les détails d'un site touristique
    public function show($id)
    {
        $site = TouristSite::findOrFail($id);
        $reviews = Review::where('tourist_site_id', $id)->latest()->take(5)->get();

        return view('pages.tourist-site-details', compact('site', 'reviews'));
    }

    // Permet à un utilisateur de laisser un avis
    public function leaveReview(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:500',
        ]);

        Review::create([
            'user_id' => auth()->id(),
            'tourist_site_id' => $id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'Votre avis a été enregistré.');
    }
}
