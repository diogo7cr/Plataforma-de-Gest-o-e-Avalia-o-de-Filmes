<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'tmdb_id',
        'title',
        'overview',
        'poster_path',
        'backdrop_path',
        'release_date',
        'rating',
        'genres',
        'custom_poster',
    ];

    // Relações
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    // Média de avaliações
    public function averageRating()
    {
        return round($this->ratings()->avg('rating'), 1);
    }
}