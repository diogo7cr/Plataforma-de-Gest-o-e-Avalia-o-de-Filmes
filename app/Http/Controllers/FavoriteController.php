<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    public function toggle(Movie $movie)
    {
        $favorite = Favorite::where('user_id', auth()->id())
            ->where('movie_id', $movie->id)
            ->first();

        if ($favorite) {
            $favorite->delete();
        } else {
            Favorite::create([
                'user_id' => auth()->id(),
                'movie_id' => $movie->id
            ]);
        }

        return back();
    }
}