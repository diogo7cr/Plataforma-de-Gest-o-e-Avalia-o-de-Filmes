<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| ROTAS PÚBLICAS
|--------------------------------------------------------------------------
*/

Route::get('/', [MovieController::class, 'index'])->name('home');
Route::get('/about', fn () => view('about'))->name('about');
Route::get('/saiba-mais', fn () => view('saiba-mais'))->name('saiba-mais');
Route::get('/movies/search', [MovieController::class, 'search'])->name('movies.search');
Route::get('/movies/{movie}', [MovieController::class, 'show'])->name('movies.show');

/*
|--------------------------------------------------------------------------
| ROTAS AUTENTICADAS
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    // Dashboard do utilizador
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Interações com filmes
    Route::post('/movies/{movie}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::post('/movies/{movie}/ratings', [RatingController::class, 'store'])->name('ratings.store');
    Route::post('/movies/{movie}/favorite', [FavoriteController::class, 'toggle'])->name('favorites.toggle');
});

/*
|--------------------------------------------------------------------------
| ROTAS ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard Admin
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    
    // Gestão de Utilizadores
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::post('/users/{user}/toggle-admin', [AdminController::class, 'toggleAdmin'])->name('users.toggle-admin');
    Route::delete('/users/{user}', [AdminController::class, 'deleteUser'])->name('users.delete');
    
    // Gestão de Filmes (Listagem Admin)
    Route::get('/movies', [AdminController::class, 'movies'])->name('movies');
    Route::delete('/movies/{movie}', [AdminController::class, 'deleteMovie'])->name('movies.delete');
    
    // Gestão de Comentários
    Route::get('/comments', [AdminController::class, 'comments'])->name('comments');
    Route::delete('/comments/{comment}', [AdminController::class, 'deleteComment'])->name('comments.delete');
    
    // Exportações CSV
    Route::get('/export/users', [AdminController::class, 'exportUsers'])->name('export.users');
    Route::get('/export/movies', [AdminController::class, 'exportMovies'])->name('export.movies');
});

/*
|--------------------------------------------------------------------------
| CRUD DE FILMES (ADMIN APENAS)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/movies/create', [MovieController::class, 'create'])->name('movies.create');
    Route::post('/admin/movies/store', [MovieController::class, 'store'])->name('movies.store');
    Route::get('/admin/movies/{movie}/edit', [MovieController::class, 'edit'])->name('movies.edit');
    Route::put('/admin/movies/{movie}/update', [MovieController::class, 'update'])->name('movies.update');
    Route::delete('/admin/movies/{movie}/destroy', [MovieController::class, 'destroy'])->name('movies.destroy');
    Route::post('/admin/movies/{movie}/upload-poster', [MovieController::class, 'uploadPoster'])->name('movies.uploadPoster');
});

require __DIR__.'/auth.php';