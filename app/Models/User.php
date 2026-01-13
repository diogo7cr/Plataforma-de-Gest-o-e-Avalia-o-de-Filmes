<?php

namespace App\Models;

// ❌ COMENTAR ESTA LINHA PARA DESATIVAR EMAIL VERIFICATION:
// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// ❌ REMOVER "implements MustVerifyEmail"
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Atributos que podem ser preenchidos em massa
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Atributos que devem ser escondidos na serialização
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casting de atributos
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * RELAÇÕES
     */
    
    // Filmes favoritos do utilizador
    public function favorites()
    {
        return $this->hasMany(\App\Models\Favorite::class);
    }

    // Avaliações do utilizador
    public function ratings()
    {
        return $this->hasMany(\App\Models\Rating::class);
    }

    // Comentários do utilizador
    public function comments()
    {
        return $this->hasMany(\App\Models\Comment::class);
    }

    /**
     * Verificar se o utilizador é admin
     */
    public function isAdmin()
    {
        return $this->is_admin === 1 || $this->is_admin === true;
    }

    /**
     * Verificar se o utilizador favoritou um filme
     */
    public function hasFavorited($movieId)
    {
        return $this->favorites()->where('movie_id', $movieId)->exists();
    }

    /**
     * Obter a avaliação do utilizador para um filme
     */
    public function getRatingForMovie($movieId)
    {
        return $this->ratings()->where('movie_id', $movieId)->first();
    }
}