<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function store(Request $request, Movie $movie)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5'
        ]);

        Rating::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'movie_id' => $movie->id
            ],
            [
                'rating' => $request->rating
            ]
        );

        return back()->with('success', 'Avaliação guardada!');
    }
}