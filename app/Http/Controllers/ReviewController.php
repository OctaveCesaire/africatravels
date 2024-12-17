<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    // Affiche les avis récents sur une entité donnée
    public function getRecentReviews($entityId, $entityType)
    {
        $reviews = Review::where('reviewable_id', $entityId)
                         ->where('reviewable_type', $entityType)
                         ->latest()
                         ->take(5)
                         ->get();

        return view('partials.reviews', compact('reviews'));
    }

    // Laisse un avis sur une entité (site, événement, agence)
    public function store(Request $request)
    {
        $request->validate([
            'reviewable_id' => 'required|integer',
            'reviewable_type' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:500',
        ]);

        Review::create([
            'user_id' => auth()->id(),
            'reviewable_id' => $request->reviewable_id,
            'reviewable_type' => $request->reviewable_type,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'Votre avis a été soumis.');
    }
}

