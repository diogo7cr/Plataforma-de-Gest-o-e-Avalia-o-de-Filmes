<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Movie $movie)
    {
        $request->validate([
            'content' => 'required|string|min:3'
        ]);

        Comment::create([
            'user_id' => auth()->id(),
            'movie_id' => $movie->id,
            'content' => $request->content
        ]);

        return back()->with('success', 'Comentário adicionado!');
    }
}