<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Movie;
use App\Models\Comment;
use App\Models\Rating;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Dashboard principal com TODOS os gráficos
     */
    public function index()
    {
        // Estatísticas gerais
        $stats = [
            'users' => User::count(),
            'admins' => User::where('is_admin', true)->count(),
            'movies' => Movie::count(),
            'comments' => Comment::count(),
            'ratings' => Rating::count(),
            'favorites' => Favorite::count(),
        ];

        // Gráfico - Utilizadores registados por mês (últimos 6 meses)
        $usersPerMonth = User::select(
            DB::raw('COUNT(*) as count'),
            DB::raw('strftime("%Y-%m", created_at) as month')
        )
        ->where('created_at', '>=', now()->subMonths(6))
        ->groupBy('month')
        ->orderBy('month')
        ->get();

        // Top 5 filmes mais avaliados
        $topMovies = Movie::withCount('ratings')
            ->orderBy('ratings_count', 'desc')
            ->take(5)
            ->get();
        
        // **NOVO: Comentários por filme (Top 5)**
        $topCommentedMovies = Movie::withCount('comments')
            ->orderBy('comments_count', 'desc')
            ->take(5)
            ->get();
        
        // **NOVO: Utilizadores mais ativos (por comentários)**
        $activeUsers = User::withCount('comments')
            ->orderBy('comments_count', 'desc')
            ->take(5)
            ->get();
        
        // **NOVO: Distribuição de avaliações (1-5 estrelas)**
        $ratingDistribution = Rating::select('rating', DB::raw('COUNT(*) as count'))
            ->groupBy('rating')
            ->orderBy('rating')
            ->get();

        // Comentários recentes
        $recentComments = Comment::with(['user', 'movie'])
            ->latest()
            ->take(10)
            ->get();

        // Utilizadores recentes
        $recentUsers = User::latest()
            ->take(10)
            ->get();

        return view('admin.dashboard', compact(
            'stats',
            'usersPerMonth',
            'topMovies',
            'topCommentedMovies',
            'activeUsers',
            'ratingDistribution',
            'recentComments',
            'recentUsers'
        ));
    }

    /**
     * Gestão de utilizadores
     */
    public function users()
    {
        $users = User::withCount(['comments', 'ratings', 'favorites'])
            ->latest()
            ->paginate(20);

        return view('admin.users', compact('users'));
    }

    /**
     * Tornar utilizador admin / Remover admin
     */
    public function toggleAdmin(User $user)
    {
        // Não pode remover admin de si próprio
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Não podes alterar as tuas próprias permissões!');
        }

        $user->update(['is_admin' => !$user->is_admin]);

        return back()->with('success', 
            $user->is_admin 
                ? "✅ {$user->name} agora é administrador!" 
                : "❌ {$user->name} já não é administrador."
        );
    }

    /**
     * Apagar utilizador
     */
    public function deleteUser(User $user)
    {
        // Não pode apagar-se a si próprio
        if ($user->id === auth()->id()) {
            return back()->with('error', '⚠️ Não podes apagar a tua própria conta!');
        }

        $userName = $user->name;
        $user->delete();

        return back()->with('success', "🗑️ Utilizador {$userName} apagado com sucesso!");
    }

    /**
     * Gestão de filmes
     */
    public function movies()
{
    $movies = Movie::withCount(['comments', 'ratings', 'favorites'])
        ->orderBy('created_at', 'desc')
        ->paginate(20);
    
    return view('admin.movies', compact('movies'));
}

    /**
     * Apagar filme
     */
    public function deleteMovie(Movie $movie)
    {
        // Apagar poster customizado se existir
        if ($movie->custom_poster && file_exists(public_path($movie->custom_poster))) {
            unlink(public_path($movie->custom_poster));
        }

        $movieTitle = $movie->title;
        $movie->delete();

        return back()->with('success', "🗑️ Filme '{$movieTitle}' apagado com sucesso!");
    }

    /**
     * Gestão de comentários
     */
    public function comments()
    {
        $comments = Comment::with(['user', 'movie'])
            ->latest()
            ->paginate(30);

        return view('admin.comments', compact('comments'));
    }

    /**
     * Apagar comentário
     */
    public function deleteComment(Comment $comment)
    {
        $comment->delete();

        return back()->with('success', '🗑️ Comentário apagado com sucesso!');
    }

    /**
     * Exportar utilizadores (CSV)
     */
    public function exportUsers()
    {
        $users = User::withCount(['comments', 'ratings', 'favorites'])->get();

        $filename = 'users_' . now()->format('Y-m-d_His') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        $callback = function() use ($users) {
            $file = fopen('php://output', 'w');

            // BOM para UTF-8 (corrige acentos no Excel)
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));

            // Cabeçalho
            fputcsv($file, [
                'ID', 
                'Nome', 
                'Email', 
                'Admin', 
                'Email Verificado',
                'Comentários', 
                'Avaliações', 
                'Favoritos', 
                'Registado em'
            ], ';');

            // Dados
            foreach ($users as $user) {
                fputcsv($file, [
                    $user->id,
                    $user->name,
                    $user->email,
                    $user->is_admin ? 'Sim' : 'Não',
                    $user->email_verified_at ? 'Sim' : 'Não',
                    $user->comments_count,
                    $user->ratings_count,
                    $user->favorites_count,
                    $user->created_at->format('d/m/Y H:i'),
                ], ';');
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Exportar filmes (CSV)
     */
    public function exportMovies()
    {
        $movies = Movie::withCount(['comments', 'ratings', 'favorites'])
            ->withAvg('ratings', 'rating')
            ->get();

        $filename = 'movies_' . now()->format('Y-m-d_His') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        $callback = function() use ($movies) {
            $file = fopen('php://output', 'w');

            // BOM para UTF-8
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));

            // Cabeçalho
            fputcsv($file, [
                'ID', 
                'Título', 
                'Géneros', 
                'Data Lançamento', 
                'Avaliação Média',
                'Comentários', 
                'Avaliações', 
                'Favoritos',
                'Adicionado em'
            ], ';');

            // Dados
            foreach ($movies as $movie) {
                fputcsv($file, [
                    $movie->id,
                    $movie->title,
                    $movie->genres ?? 'Sem géneros',
                    $movie->release_date ? date('d/m/Y', strtotime($movie->release_date)) : 'Desconhecida',
                    $movie->ratings_avg_rating ? number_format($movie->ratings_avg_rating, 1) . ' ⭐' : 'Sem avaliações',
                    $movie->comments_count,
                    $movie->ratings_count,
                    $movie->favorites_count,
                    $movie->created_at->format('d/m/Y H:i'),
                ], ';');
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * NOVO: Exportar comentários (CSV)
     */
    public function exportComments()
    {
        $comments = Comment::with(['user', 'movie'])->get();

        $filename = 'comments_' . now()->format('Y-m-d_His') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        $callback = function() use ($comments) {
            $file = fopen('php://output', 'w');

            // BOM para UTF-8
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));

            // Cabeçalho
            fputcsv($file, [
                'ID', 
                'Utilizador', 
                'Email', 
                'Filme', 
                'Comentário', 
                'Data'
            ], ';');

            // Dados
            foreach ($comments as $comment) {
                fputcsv($file, [
                    $comment->id,
                    $comment->user->name,
                    $comment->user->email,
                    $comment->movie->title,
                    $comment->content,
                    $comment->created_at->format('d/m/Y H:i'),
                ], ';');
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * NOVO: Estatísticas detalhadas (para gráficos avançados)
     */
    public function statistics()
    {
        $data = [
            // Atividade nos últimos 30 dias
            'activity' => [
                'users' => User::where('created_at', '>=', now()->subDays(30))->count(),
                'comments' => Comment::where('created_at', '>=', now()->subDays(30))->count(),
                'ratings' => Rating::where('created_at', '>=', now()->subDays(30))->count(),
            ],

            // Filme mais popular (por favoritos)
            'mostFavorited' => Movie::withCount('favorites')
                ->orderBy('favorites_count', 'desc')
                ->first(),

            // Melhor avaliado
            'bestRated' => Movie::withAvg('ratings', 'rating')
                ->having('ratings_avg_rating', '>', 0)
                ->orderBy('ratings_avg_rating', 'desc')
                ->first(),

            // Utilizador mais ativo
            'mostActiveUser' => User::withCount('comments')
                ->orderBy('comments_count', 'desc')
                ->first(),
        ];

        return response()->json($data);
    }
    
}

