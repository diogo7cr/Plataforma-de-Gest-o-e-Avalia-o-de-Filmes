<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Rating;
use App\Models\Comment;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $favorites = Favorite::with('movie')
            ->where('user_id', $user->id)
            ->get();

        $ratings = Rating::with('movie')
            ->where('user_id', $user->id)
            ->get();

        $comments = Comment::with('movie')
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        return view('dashboard', compact('favorites', 'ratings', 'comments'));
    }
}