@extends('layouts.main')

@section('content')

<div style="padding: 40px; max-width: 1400px; margin: 0 auto;">

    <!-- CABEÇALHO -->
    <div style="margin-bottom: 60px;">
        <h1 style="font-size: 3rem; color: #fff; margin-bottom: 10px;">
            👤 Meu Dashboard
        </h1>
        <p style="color: #b3b3b3; font-size: 1.1rem;">
            Bem-vindo de volta, {{ auth()->user()->name }}!
        </p>
    </div>

    <!-- ESTATÍSTICAS RÁPIDAS -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 60px;">
        <div style="background: linear-gradient(135deg, #e50914 0%, #b00710 100%); padding: 30px; border-radius: 12px; text-align: center;">
            <h3 style="font-size: 1rem; color: rgba(255,255,255,0.9); margin-bottom: 10px; text-transform: uppercase; letter-spacing: 1px;">
                Favoritos
            </h3>
            <p style="font-size: 3rem; font-weight: bold; color: #fff;">
                {{ $favorites->count() }}
            </p>
        </div>
        
        <div style="background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%); padding: 30px; border-radius: 12px; text-align: center;">
            <h3 style="font-size: 1rem; color: rgba(0,0,0,0.8); margin-bottom: 10px; text-transform: uppercase; letter-spacing: 1px;">
                Avaliações
            </h3>
            <p style="font-size: 3rem; font-weight: bold; color: #000;">
                {{ $ratings->count() }}
            </p>
        </div>
        
        <div style="background: linear-gradient(135deg, #4caf50 0%, #388e3c 100%); padding: 30px; border-radius: 12px; text-align: center;">
            <h3 style="font-size: 1rem; color: rgba(255,255,255,0.9); margin-bottom: 10px; text-transform: uppercase; letter-spacing: 1px;">
                Comentários
            </h3>
            <p style="font-size: 3rem; font-weight: bold; color: #fff;">
                {{ $comments->count() }}
            </p>
        </div>
    </div>

    <!-- FAVORITOS -->
    <div style="margin-bottom: 80px;">
        <h2 style="font-size: 2.2rem; color: #e50914; margin-bottom: 30px; display: flex; align-items: center; gap: 15px;">
            ❤️ Meus Favoritos
        </h2>
        
        @if($favorites->isEmpty())
            <div style="background: #1c1c1c; padding: 60px; border-radius: 12px; text-align: center;">
                <p style="color: #b3b3b3; font-size: 1.2rem; margin-bottom: 20px;">
                    Ainda não tens filmes favoritos.
                </p>
                <a href="/" style="display: inline-block; background: #e50914; color: #fff; padding: 12px 30px; border-radius: 6px; text-decoration: none; font-weight: bold;">
                    Explorar Filmes
                </a>
            </div>
        @else
            <div class="cards">
                @foreach($favorites as $fav)
                    <div class="card" onclick="window.location='{{ route('movies.show', $fav->movie) }}'">
                        @if($fav->movie->custom_poster)
                            <img src="{{ asset($fav->movie->custom_poster) }}" alt="{{ $fav->movie->title }}">
                        @elseif($fav->movie->poster_path)
                            <img src="https://image.tmdb.org/t/p/w500{{ $fav->movie->poster_path }}" alt="{{ $fav->movie->title }}">
                        @else
                            <div class="no-image">Sem imagem</div>
                        @endif
                        
                        <div class="text-card">
                            <h3>{{ $fav->movie->title }}</h3>
                            <p>{{ $fav->movie->genres ?? 'Sem géneros' }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <!-- AVALIAÇÕES -->
    <div style="margin-bottom: 80px;">
        <h2 style="font-size: 2.2rem; color: #e50914; margin-bottom: 30px; display: flex; align-items: center; gap: 15px;">
            ⭐ Minhas Avaliações
        </h2>
        
        @if($ratings->isEmpty())
            <div style="background: #1c1c1c; padding: 60px; border-radius: 12px; text-align: center;">
                <p style="color: #b3b3b3; font-size: 1.2rem;">
                    Ainda não avaliaste nenhum filme.
                </p>
            </div>
        @else
            <div style="display: grid; gap: 15px;">
                @foreach($ratings as $rate)
                    <div style="background: #1c1c1c; padding: 25px 30px; border-radius: 10px; display: flex; justify-content: space-between; align-items: center; transition: transform 0.3s, box-shadow 0.3s; cursor: pointer;"
                         onclick="window.location='{{ route('movies.show', $rate->movie) }}'"
                         onmouseover="this.style.transform='translateX(10px)'; this.style.boxShadow='0 4px 20px rgba(229, 9, 20, 0.3)'"
                         onmouseout="this.style.transform=''; this.style.boxShadow=''">
                        <div>
                            <h3 style="color: #fff; font-size: 1.3rem; margin-bottom: 5px;">
                                {{ $rate->movie->title }}
                            </h3>
                            <p style="color: #b3b3b3; font-size: 0.9rem;">
                                {{ $rate->movie->release_date ? \Carbon\Carbon::parse($rate->movie->release_date)->format('Y') : 'Data desconhecida' }}
                            </p>
                        </div>
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <span style="color: #ffc107; font-size: 2rem; font-weight: bold;">
                                {{ $rate->rating }}
                            </span>
                            <span style="color: #ffc107; font-size: 1.5rem;">⭐</span>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <!-- COMENTÁRIOS -->
    <div style="margin-bottom: 80px;">
        <h2 style="font-size: 2.2rem; color: #e50914; margin-bottom: 30px; display: flex; align-items: center; gap: 15px;">
            💬 Meus Comentários
        </h2>
        
        @if($comments->isEmpty())
            <div style="background: #1c1c1c; padding: 60px; border-radius: 12px; text-align: center;">
                <p style="color: #b3b3b3; font-size: 1.2rem;">
                    Ainda não comentaste em nenhum filme.
                </p>
            </div>
        @else
            <div style="display: grid; gap: 20px;">
                @foreach($comments as $comment)
                    <div style="background: #1c1c1c; padding: 30px; border-radius: 12px; border-left: 4px solid #e50914; transition: transform 0.3s; cursor: pointer;"
                         onclick="window.location='{{ route('movies.show', $comment->movie) }}'"
                         onmouseover="this.style.transform='translateX(10px)'"
                         onmouseout="this.style.transform=''">
                        <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 15px;">
                            <h3 style="color: #e50914; font-size: 1.4rem; font-weight: bold;">
                                {{ $comment->movie->title }}
                            </h3>
                            <span style="color: #888; font-size: 0.9rem;">
                                {{ $comment->created_at->diffForHumans() }}
                            </span>
                        </div>
                        <p style="color: #e0e0e0; line-height: 1.8; font-size: 1.05rem;">
                            "{{ $comment->content }}"
                        </p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

</div>

@endsection
