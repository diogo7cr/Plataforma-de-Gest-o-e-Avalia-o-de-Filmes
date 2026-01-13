<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Movie;

class MovieController extends Controller
{
    /**
     * Listagem de filmes (Homepage)
     */
    public function index(Request $request)
    {
        $query = Movie::query();
        
        // Filtro por género
        if ($request->filled('genre')) {
            $query->where('genres', 'like', '%' . $request->genre . '%');
        }
        
        // Filtro por ano
        if ($request->filled('year')) {
            $query->whereYear('release_date', $request->year);
        }
        
        // Ordenação
        $orderBy = $request->get('order_by', 'created_at');
        $orderDirection = $request->get('order_direction', 'desc');
        
        if ($orderBy === 'rating') {
            $query->withAvg('ratings', 'rating')
                  ->orderBy('ratings_avg_rating', $orderDirection);
        } else {
            $query->orderBy($orderBy, $orderDirection);
        }
        
        // Pesquisa por título
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }
        
        $movies = $query->paginate(12)->withQueryString();
        
        $availableGenres = Movie::distinct()
            ->pluck('genres')
            ->flatMap(fn($genres) => explode(', ', $genres))
            ->unique()
            ->sort()
            ->values();
        
        return view('movies.index', compact('movies', 'availableGenres'));
    }

    /**
     * Formulário de criar filme (ADMIN)
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Guardar novo filme (ADMIN)
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'overview' => 'nullable|string',
            'genres' => 'nullable|string',
            'release_date' => 'nullable|date',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // Inicializar custom_poster como null
        $validated['custom_poster'] = null;

        // Upload de poster
        if ($request->hasFile('poster')) {
            $path = 'uploads/posters';
            
            // Criar pasta se não existir
            if (!file_exists(public_path($path))) {
                mkdir(public_path($path), 0755, true);
            }

            $image = $request->file('poster');
            $imageName = time() . '_' . uniqid() . '.' . $image->extension();
            $image->move(public_path($path), $imageName);
            $validated['custom_poster'] = $path . '/' . $imageName;
        }

        // Criar o filme
        Movie::create($validated);

        return redirect()->route('admin.movies')->with('success', 'Filme criado com sucesso! 🎉');
    }

    /**
     * Ver detalhes do filme
     */
    public function show(Movie $movie)
    {
        $movie->load(['comments.user', 'ratings', 'favorites']);
        return view('movies.show', compact('movie'));
    }

    /**
     * Formulário de editar filme (ADMIN)
     */
    public function edit(Movie $movie)
    {
        return view('movies.edit', compact('movie'));
    }

    /**
     * Atualizar filme (ADMIN)
     */
    public function update(Request $request, Movie $movie)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'overview' => 'nullable|string',
            'genres' => 'nullable|string',
            'release_date' => 'nullable|date',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // Upload de novo poster
        if ($request->hasFile('poster')) {
            // Apagar poster antigo se existir
            if ($movie->custom_poster && file_exists(public_path($movie->custom_poster))) {
                unlink(public_path($movie->custom_poster));
            }

            $path = 'uploads/posters';
            
            // Criar pasta se não existir
            if (!file_exists(public_path($path))) {
                mkdir(public_path($path), 0755, true);
            }

            $image = $request->file('poster');
            $imageName = time() . '_' . uniqid() . '.' . $image->extension();
            $image->move(public_path($path), $imageName);
            $validated['custom_poster'] = $path . '/' . $imageName;
        }

        // Atualizar o filme
        $movie->update($validated);

        return redirect()->route('admin.movies')->with('success', 'Filme atualizado com sucesso! ✅');
    }

    /**
     * Apagar filme (ADMIN)
     */
    public function destroy(Movie $movie)
    {
        // Apagar poster customizado se existir
        if ($movie->custom_poster && file_exists(public_path($movie->custom_poster))) {
            unlink(public_path($movie->custom_poster));
        }

        // Apagar o filme
        $movie->delete();

        return redirect()->route('admin.movies')->with('success', 'Filme removido com sucesso! 🗑️');
    }

    /**
     * Pesquisar filmes na API TMDB
     */
    public function search(Request $request)
    {
        $response = Http::get(
            config('services.tmdb.url') . '/search/movie',
            [
                'api_key' => config('services.tmdb.key'),
                'query' => $request->query('query'),
                'language' => 'pt-BR',
            ]
        );

        $genreMap = [
            28 => 'Ação', 12 => 'Aventura', 16 => 'Animação', 35 => 'Comédia',
            80 => 'Crime', 99 => 'Documentário', 18 => 'Drama', 10751 => 'Família',
            14 => 'Fantasia', 36 => 'História', 27 => 'Terror', 10402 => 'Música',
            9648 => 'Mistério', 10749 => 'Romance', 878 => 'Ficção Científica',
            10770 => 'TV', 53 => 'Thriller', 10752 => 'Guerra', 37 => 'Western',
        ];

        $movies = collect($response->json('results') ?? [])->map(function ($movie) use ($genreMap) {
            $movie['genre_names'] = collect($movie['genre_ids'] ?? [])
                ->map(fn($id) => $genreMap[$id] ?? null)
                ->filter()
                ->implode(', ');
            return $movie;
        });

        return view('movies.search', compact('movies'));
    }

    /**
     * Upload de poster customizado (ADMIN)
     */
    public function uploadPoster(Request $request, Movie $movie)
    {
        $request->validate([
            'poster' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        // Apagar poster anterior se existir
        if ($movie->custom_poster && file_exists(public_path($movie->custom_poster))) {
            unlink(public_path($movie->custom_poster));
        }

        $path = 'uploads/posters';
        
        // Criar pasta se não existir
        if (!file_exists(public_path($path))) {
            mkdir(public_path($path), 0755, true);
        }

        $image = $request->file('poster');
        $imageName = time() . '_' . $movie->id . '.' . $image->extension();
        $image->move(public_path($path), $imageName);

        // Atualizar o poster do filme
        $movie->update(['custom_poster' => $path . '/' . $imageName]);

        return back()->with('success', 'Poster atualizado! 🖼️');
    }
}