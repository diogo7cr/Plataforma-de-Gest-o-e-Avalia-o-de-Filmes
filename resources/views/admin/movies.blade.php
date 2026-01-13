@extends('layouts.main')

@section('content')

<div style="max-width: 1600px; margin: 40px auto; padding: 40px;">
    
    {{-- CABEÇALHO --}}
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px;">
        <h1 style="font-size: 2.5rem; color: #e50914;">
            🎬 Gestão de Filmes
        </h1>
        <div style="display: flex; gap: 15px;">
            <a href="{{ route('movies.create') }}" 
               style="background: #4caf50; color: #fff; padding: 12px 25px; border-radius: 6px; text-decoration: none; font-weight: bold; font-size: 1rem;">
                ➕ Adicionar Filme
            </a>
            <a href="{{ route('admin.dashboard') }}" 
               style="background: #2a2a2a; color: #fff; padding: 12px 25px; border-radius: 6px; text-decoration: none; font-weight: bold; font-size: 1rem;">
                ← Voltar
            </a>
        </div>
    </div>

    {{-- MENSAGENS --}}
    @if(session('success'))
        <div style="background: #4caf50; color: #fff; padding: 15px 20px; border-radius: 6px; margin-bottom: 20px; font-weight: bold;">
            ✅ {{ session('success') }}
        </div>
    @endif

    {{-- ESTATÍSTICAS --}}
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 40px;">
        <div style="background: #1c1c1c; padding: 20px; border-radius: 8px; text-align: center; border: 2px solid #e50914;">
            <h3 style="color: #b3b3b3; font-size: 0.9rem; margin-bottom: 10px;">TOTAL DE FILMES</h3>
            <p style="font-size: 2.5rem; color: #e50914; font-weight: bold; margin: 0;">{{ $movies->total() }}</p>
        </div>
    </div>

    {{-- TABELA --}}
    <div style="background: #1c1c1c; padding: 30px; border-radius: 12px; overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="border-bottom: 2px solid #333;">
                    <th style="padding: 15px; text-align: left; color: #b3b3b3; font-weight: bold;">Poster</th>
                    <th style="padding: 15px; text-align: left; color: #b3b3b3; font-weight: bold;">Título</th>
                    <th style="padding: 15px; text-align: left; color: #b3b3b3; font-weight: bold;">Géneros</th>
                    <th style="padding: 15px; text-align: left; color: #b3b3b3; font-weight: bold;">Ano</th>
                    <th style="padding: 15px; text-align: center; color: #b3b3b3; font-weight: bold;">💬</th>
                    <th style="padding: 15px; text-align: center; color: #b3b3b3; font-weight: bold;">⭐</th>
                    <th style="padding: 15px; text-align: center; color: #b3b3b3; font-weight: bold;">❤️</th>
                    <th style="padding: 15px; text-align: center; color: #b3b3b3; font-weight: bold;">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($movies as $movie)
                    <tr style="border-bottom: 1px solid #2a2a2a;">
                        {{-- POSTER --}}
                        <td style="padding: 15px;">
                            @if($movie->custom_poster)
                                <img src="{{ asset($movie->custom_poster) }}" 
                                     alt="{{ $movie->title }}"
                                     style="width: 60px; height: 90px; object-fit: cover; border-radius: 4px; border: 2px solid #e50914;">
                            @elseif($movie->poster_path)
                                <img src="https://image.tmdb.org/t/p/w200{{ $movie->poster_path }}" 
                                     alt="{{ $movie->title }}"
                                     style="width: 60px; height: 90px; object-fit: cover; border-radius: 4px;">
                            @else
                                <div style="width: 60px; height: 90px; background: #2a2a2a; border-radius: 4px; display: flex; align-items: center; justify-content: center; color: #666; font-size: 0.7rem; text-align: center;">
                                    Sem<br>Poster
                                </div>
                            @endif
                        </td>

                        {{-- TÍTULO --}}
                        <td style="padding: 15px;">
                            <a href="{{ route('movies.show', $movie) }}" 
                               style="color: #fff; text-decoration: none; font-weight: bold; display: block; margin-bottom: 5px; font-size: 1rem;">
                                {{ $movie->title }}
                            </a>
                            <span style="color: #888; font-size: 0.85rem;">ID: {{ $movie->id }}</span>
                        </td>

                        {{-- GÉNEROS --}}
                        <td style="padding: 15px; color: #b3b3b3; font-size: 0.9rem;">
                            {{ Str::limit($movie->genres ?? 'Sem géneros', 30) }}
                        </td>

                        {{-- ANO --}}
                        <td style="padding: 15px; color: #b3b3b3; font-size: 0.9rem;">
                            {{ $movie->release_date ? \Carbon\Carbon::parse($movie->release_date)->format('Y') : '-' }}
                        </td>

                        {{-- COMENTÁRIOS --}}
                        <td style="padding: 15px; text-align: center;">
                            <span style="background: #4caf50; color: #fff; padding: 5px 12px; border-radius: 20px; font-size: 0.85rem; font-weight: bold;">
                                {{ $movie->comments_count ?? 0 }}
                            </span>
                        </td>

                        {{-- AVALIAÇÕES --}}
                        <td style="padding: 15px; text-align: center;">
                            <span style="background: #ffc107; color: #000; padding: 5px 12px; border-radius: 20px; font-size: 0.85rem; font-weight: bold;">
                                {{ $movie->ratings_count ?? 0 }}
                            </span>
                        </td>

                        {{-- FAVORITOS --}}
                        <td style="padding: 15px; text-align: center;">
                            <span style="background: #f44336; color: #fff; padding: 5px 12px; border-radius: 20px; font-size: 0.85rem; font-weight: bold;">
                                {{ $movie->favorites_count ?? 0 }}
                            </span>
                        </td>

                        {{-- AÇÕES --}}
                        <td style="padding: 15px;">
                            <div style="display: flex; gap: 8px; justify-content: center; flex-wrap: wrap;">
                                
                                {{-- VER --}}
                                <a href="{{ route('movies.show', $movie) }}" 
                                   style="background: #2196f3; color: #fff; padding: 8px 15px; border-radius: 4px; text-decoration: none; font-size: 0.85rem; font-weight: bold; white-space: nowrap;">
                                    👁️ Ver
                                </a>

                                {{-- EDITAR --}}
                                <a href="{{ route('movies.edit', $movie) }}" 
                                   style="background: #ffc107; color: #000; padding: 8px 15px; border-radius: 4px; text-decoration: none; font-size: 0.85rem; font-weight: bold; white-space: nowrap;">
                                    ✏️ Editar
                                </a>

                                {{-- APAGAR --}}
                                <form method="POST" 
                                      action="{{ route('movies.destroy', $movie) }}" 
                                      onsubmit="return confirm('⚠️ Tens a certeza que queres apagar \"{{ addslashes($movie->title) }}\"?\n\nIsso vai remover:\n- Todos os comentários\n- Todas as avaliações\n- Todos os favoritos\n\nEsta ação é IRREVERSÍVEL!')"
                                      style="display: inline; margin: 0;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            style="background: #f44336; color: #fff; padding: 8px 15px; border: none; border-radius: 4px; cursor: pointer; font-size: 0.85rem; font-weight: bold; white-space: nowrap;">
                                        🗑️ Apagar
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" style="padding: 40px; text-align: center; color: #888;">
                            <p style="font-size: 1.2rem; margin-bottom: 20px;">📽️ Nenhum filme encontrado</p>
                            <a href="{{ route('movies.create') }}" 
                               style="background: #e50914; color: #fff; padding: 12px 25px; border-radius: 6px; text-decoration: none; font-weight: bold;">
                                ➕ Adicionar Primeiro Filme
                            </a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>