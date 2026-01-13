@extends('layouts.main')

@section('content')

<div class="movie-detail">
    
    {{-- BANNER DO FILME --}}
    @if($movie->backdrop_path)
        <div class="movie-banner" style="background-image: url('https://image.tmdb.org/t/p/original{{ $movie->backdrop_path }}')">
            <div class="overlay">
                <h1>{{ $movie->title }}</h1>
            </div>
        </div>
    @endif

    {{-- INFO DO FILME --}}
    <div class="movie-info">
        @if($movie->custom_poster)
            <img src="{{ asset($movie->custom_poster) }}" alt="{{ $movie->title }}">
        @elseif($movie->poster_path)
            <img src="https://image.tmdb.org/t/p/w500{{ $movie->poster_path }}" alt="{{ $movie->title }}">
        @else
            <div class="no-image">Sem imagem</div>
        @endif
        
        <div>
            <h2>{{ $movie->title }}</h2>
            <p>{{ $movie->overview }}</p>
            <p><strong>Data:</strong> {{ $movie->release_date ?? 'Desconhecida' }}</p>
            <p><strong>Géneros:</strong> {{ $movie->genres ?? 'Sem géneros' }}</p>
            <p><strong>Média:</strong> ⭐ {{ $movie->averageRating() ?? 'Sem avaliações' }}/5</p>
        </div>
    </div>

    {{-- BOTÃO FAVORITOS --}}
    <div style="padding: 0 40px 20px;">
        @auth
            <form action="{{ route('favorites.toggle', $movie) }}" method="POST">
                @csrf
                <button type="submit" class="btn-favorite {{ auth()->user()->favorites->where('movie_id', $movie->id)->isNotEmpty() ? 'active' : '' }}">
                    @if(auth()->user()->favorites->where('movie_id', $movie->id)->isNotEmpty())
                        ❤️ Remover dos favoritos
                    @else
                        🤍 Adicionar aos favoritos
                    @endif
                </button>
            </form>
        @else
            <p style="color: #b3b3b3;">
                Faz <a href="{{ route('login') }}" style="color: #e50914;">login</a> para adicionar aos favoritos
            </p>
        @endauth
    </div>

    <hr style="border: 1px solid #333; margin: 40px;">

    {{-- AVALIAÇÃO --}}
    @auth
    <div class="rating-section">
        <h3>Avaliar filme</h3>
        <form action="{{ route('ratings.store', $movie) }}" method="POST">
            @csrf
            <select name="rating" required>
                <option value="">Escolhe uma avaliação</option>
                @for($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}">{{ $i }} ⭐</option>
                @endfor
            </select>
            <button type="submit">Enviar</button>
        </form>
    </div>
    @else
        <p style="padding: 40px; color: #b3b3b3;">
            Faz <a href="{{ route('login') }}" style="color: #e50914;">login</a> para avaliar
        </p>
    @endauth

    <hr style="border: 1px solid #333; margin: 40px;">

    {{-- COMENTÁRIOS --}}
    <div class="comments-section">
        <h3>Comentários</h3>

        @auth
            <form action="{{ route('comments.store', $movie) }}" method="POST">
                @csrf
                <textarea name="content" required placeholder="Escreve o teu comentário..."></textarea>
                <button type="submit">Comentar</button>
            </form>
        @else
            <p style="color: #b3b3b3;">
                Faz <a href="{{ route('login') }}" style="color: #e50914;">login</a> para comentar
            </p>
        @endauth

        @forelse($movie->comments as $comment)
            <div class="comment">
                <strong>{{ $comment->user->name }}</strong>
                <p>{{ $comment->content }}</p>
                <small>{{ $comment->created_at->diffForHumans() }}</small>
            </div>
        @empty
            <p style="color: #b3b3b3;">Sem comentários ainda.</p>
        @endforelse
    </div>

</div>

@endsection