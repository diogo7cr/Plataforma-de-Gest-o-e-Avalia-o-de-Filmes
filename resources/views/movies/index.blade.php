@extends('layouts.main')

@section('content')


@php
    use Illuminate\Support\Str;
@endphp

{{-- FILTROS DE PESQUISA --}}
<div style="background: var(--bg-secondary); padding: 30px; margin: 20px 40px; border-radius: 12px; border: 1px solid var(--border-color);">
    <h3 style="color: var(--accent-color); margin-bottom: 20px; font-size: 1.5rem;">
        🔍 Pesquisa Avançada
    </h3>
    
    <form method="GET" action="{{ route('home') }}" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px;">
        
        {{-- PESQUISA POR TÍTULO --}}
        <div>
            <label style="display: block; margin-bottom: 8px; color: var(--text-secondary); font-weight: bold;">
                Título
            </label>
            <input type="text" 
                   name="search" 
                   value="{{ request('search') }}" 
                   placeholder="Pesquisar por título..." 
                   style="width: 100%; padding: 12px; background: var(--bg-tertiary); border: 1px solid var(--border-color); border-radius: 6px; color: var(--text-primary);">
        </div>
        
        {{-- FILTRO POR GÉNERO --}}
        <div>
            <label style="display: block; margin-bottom: 8px; color: var(--text-secondary); font-weight: bold;">
                Género
            </label>
            <select name="genre" 
                    style="width: 100%; padding: 12px; background: var(--bg-tertiary); border: 1px solid var(--border-color); border-radius: 6px; color: var(--text-primary);">
                <option value="">Todos os géneros</option>
                @foreach($availableGenres ?? [] as $genre)
                    <option value="{{ $genre }}" {{ request('genre') == $genre ? 'selected' : '' }}>
                        {{ $genre }}
                    </option>
                @endforeach
            </select>
        </div>
        
        {{-- FILTRO POR ANO --}}
        <div>
            <label style="display: block; margin-bottom: 8px; color: var(--text-secondary); font-weight: bold;">
                Ano
            </label>
            <select name="year" 
                    style="width: 100%; padding: 12px; background: var(--bg-tertiary); border: 1px solid var(--border-color); border-radius: 6px; color: var(--text-primary);">
                <option value="">Todos os anos</option>
                @for($year = date('Y'); $year >= 1950; $year--)
                    <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>
                        {{ $year }}
                    </option>
                @endfor
            </select>
        </div>
        
        {{-- ORDENAÇÃO --}}
        <div>
            <label style="display: block; margin-bottom: 8px; color: var(--text-secondary); font-weight: bold;">
                Ordenar por
            </label>
            <select name="order_by" 
                    style="width: 100%; padding: 12px; background: var(--bg-tertiary); border: 1px solid var(--border-color); border-radius: 6px; color: var(--text-primary);">
                <option value="created_at" {{ request('order_by') == 'created_at' ? 'selected' : '' }}>Mais recentes</option>
                <option value="title" {{ request('order_by') == 'title' ? 'selected' : '' }}>Título (A-Z)</option>
                <option value="release_date" {{ request('order_by') == 'release_date' ? 'selected' : '' }}>Data de lançamento</option>
                <option value="rating" {{ request('order_by') == 'rating' ? 'selected' : '' }}>Melhor avaliados</option>
            </select>
        </div>
        
        {{-- BOTÕES --}}
        <div style="display: flex; gap: 10px; align-items: flex-end;">
            <button type="submit" 
                    style="background: var(--accent-color); color: #fff; padding: 12px 30px; border: none; border-radius: 6px; cursor: pointer; font-weight: bold; flex: 1;">
                🔍 Pesquisar
            </button>
            <a href="{{ route('home') }}" 
               style="background: var(--bg-tertiary); color: var(--text-primary); padding: 12px 20px; border-radius: 6px; text-decoration: none; text-align: center;">
                ✕ Limpar
            </a>
        </div>
    </form>
    
    {{-- RESULTADOS --}}
    @if(request()->hasAny(['search', 'genre', 'year', 'order_by']))
        <div style="margin-top: 20px; padding: 15px; background: var(--bg-tertiary); border-radius: 6px; border-left: 4px solid var(--accent-color);">
            <p style="color: var(--text-primary); margin: 0;">
                📊 Encontrados <strong>{{ $movies->total() }}</strong> filmes
                @if(request('search'))
                    com o título "{{ request('search') }}"
                @endif
                @if(request('genre'))
                    no género "{{ request('genre') }}"
                @endif
                @if(request('year'))
                    do ano {{ request('year') }}
                @endif
            </p>
        </div>
    @endif
</div>

{{-- CARTAZ PRINCIPAL (só se não houver filtros) --}}
@if(!request()->hasAny(['search', 'genre', 'year']) && $movies->isNotEmpty())
    @php
        $movieDesc = $movies->first();
    @endphp
    <div class="Cartaz">
        <div class="bg-image" style="background-image: url('{{ $movieDesc->custom_poster ? asset($movieDesc->custom_poster) : ($movieDesc->backdrop_path ? 'https://image.tmdb.org/t/p/original' . $movieDesc->backdrop_path : '') }}');">
            <h2>{{ $movieDesc->title }}</h2>
            <p>{{ Str::limit($movieDesc->overview, 150) }}</p>
            <a href="{{ route('movies.show', $movieDesc) }}" class="btn-op" style="display: inline-block; text-decoration: none; background: #e50914; color: #fff; padding: 12px 30px; border-radius: 4px; font-weight: bold;">
                Dar opinião
            </a>
        </div>
    </div>
@endif

{{-- LISTA DE FILMES --}}
<h2 style="margin: 40px; color: var(--text-primary);">
    {{ request()->hasAny(['search', 'genre', 'year']) ? 'Resultados da Pesquisa' : 'Populares' }}
</h2>

<div class="cards">
    @forelse ($movies as $movie)
        <div class="card" onclick="window.location='{{ route('movies.show', $movie) }}'" style="cursor: pointer;">
            @if($movie->custom_poster)
                <img src="{{ asset($movie->custom_poster) }}" alt="Poster de {{ $movie->title }}">
            @elseif($movie->poster_path)
                <img src="https://image.tmdb.org/t/p/w500{{ $movie->poster_path }}" alt="Poster de {{ $movie->title }}">
            @else
                <div class="no-image" style="width: 100%; height: 300px; background: var(--bg-tertiary); display: flex; align-items: center; justify-content: center; color: var(--text-secondary); font-size: 1rem; border-radius: 8px;">
                    🎬 Sem imagem
                </div>
            @endif
            
            <div class="text-card">
                <h3>{{ $movie->title }}</h3>
                <p>{{ $movie->genres ?? 'Sem géneros' }}</p>
                <p>{{ $movie->release_date ? \Carbon\Carbon::parse($movie->release_date)->format('d/m/Y') : 'Data desconhecida' }}</p>
            </div>
        </div>
    @empty
        <div style="grid-column: 1 / -1; text-align: center; padding: 60px; color: var(--text-secondary);">
            <div style="font-size: 4rem; margin-bottom: 20px;">🎬</div>
            <p style="font-size: 1.2rem; margin-bottom: 20px;">
                😕 Nenhum filme encontrado com esses critérios.
            </p>
            <a href="{{ route('home') }}" style="color: var(--accent-color); text-decoration: none; font-weight: bold; font-size: 1.1rem;">
                ← Voltar à lista completa
            </a>
        </div>
    @endforelse
</div>

{{-- PAGINAÇÃO MELHORADA --}}
@if($movies->hasPages())
    <div style="margin: 40px; display: flex; justify-content: center; align-items: center; gap: 10px; flex-wrap: wrap;">
        {{-- Página Anterior --}}
        @if ($movies->onFirstPage())
            <span style="background: var(--bg-tertiary); color: var(--text-secondary); padding: 10px 20px; border-radius: 6px; opacity: 0.5;">
                ← Anterior
            </span>
        @else
            <a href="{{ $movies->previousPageUrl() }}" 
               style="background: var(--bg-secondary); color: var(--text-primary); padding: 10px 20px; border-radius: 6px; text-decoration: none; border: 1px solid var(--border-color);">
                ← Anterior
            </a>
        @endif
        
        {{-- Números de Página --}}
        <div style="display: flex; gap: 5px; flex-wrap: wrap;">
            @foreach(range(1, $movies->lastPage()) as $page)
                @if($page == $movies->currentPage())
                    <span style="background: var(--accent-color); color: #fff; padding: 10px 15px; border-radius: 6px; font-weight: bold;">
                        {{ $page }}
                    </span>
                @elseif($page == 1 || $page == $movies->lastPage() || abs($page - $movies->currentPage()) <= 2)
                    <a href="{{ $movies->url($page) }}" 
                       style="background: var(--bg-secondary); color: var(--text-primary); padding: 10px 15px; border-radius: 6px; text-decoration: none; border: 1px solid var(--border-color);">
                        {{ $page }}
                    </a>
                @elseif(abs($page - $movies->currentPage()) == 3)
                    <span style="color: var(--text-secondary); padding: 10px 15px;">...</span>
                @endif
            @endforeach
        </div>
        
        {{-- Próxima Página --}}
        @if ($movies->hasMorePages())
            <a href="{{ $movies->nextPageUrl() }}" 
               style="background: var(--bg-secondary); color: var(--text-primary); padding: 10px 20px; border-radius: 6px; text-decoration: none; border: 1px solid var(--border-color);">
                Próximo →
            </a>
        @else
            <span style="background: var(--bg-tertiary); color: var(--text-secondary); padding: 10px 20px; border-radius: 6px; opacity: 0.5;">
                Próximo →
            </span>
        @endif
    </div>
    
    <p style="text-align: center; color: var(--text-secondary); margin-bottom: 40px;">
        Página {{ $movies->currentPage() }} de {{ $movies->lastPage() }} ({{ $movies->total() }} filmes)
    </p>
@endif

@endsection