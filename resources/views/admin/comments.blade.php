@extends('layouts.main')

@section('content')

<div style="max-width: 1600px; margin: 40px auto; padding: 40px;">
    
    {{-- CABEÇALHO --}}
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px;">
        <h1 style="font-size: 2.5rem; color: #4caf50;">
            💬 Gestão de Comentários
        </h1>
        <a href="{{ route('admin.dashboard') }}" style="color: #e50914; text-decoration: none; font-size: 1.1rem;">
            ← Voltar ao Dashboard
        </a>
    </div>

    {{-- MENSAGENS --}}
    @if(session('success'))
        <div style="background: #4caf50; color: #fff; padding: 15px 20px; border-radius: 6px; margin-bottom: 20px;">
            ✅ {{ session('success') }}
        </div>
    @endif

    {{-- ESTATÍSTICAS RÁPIDAS --}}
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 40px;">
        <div style="background: #1c1c1c; padding: 20px; border-radius: 8px; text-align: center; border: 2px solid #4caf50;">
            <h3 style="color: #b3b3b3; font-size: 0.9rem; margin-bottom: 10px;">TOTAL COMENTÁRIOS</h3>
            <p style="font-size: 2.5rem; color: #4caf50; font-weight: bold;">{{ $comments->total() }}</p>
        </div>
    </div>

    {{-- LISTA DE COMENTÁRIOS --}}
    <div style="background: #1c1c1c; padding: 30px; border-radius: 12px;">
        <div style="display: grid; gap: 20px;">
            @foreach($comments as $comment)
                <div style="background: #2a2a2a; padding: 25px; border-radius: 10px; border-left: 4px solid #4caf50;">
                    
                    {{-- CABEÇALHO DO COMENTÁRIO --}}
                    <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 15px; flex-wrap: wrap; gap: 15px;">
                        <div style="flex: 1;">
                            <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 5px;">
                                <strong style="color: #4caf50; font-size: 1.1rem;">
                                    {{ $comment->user->name }}
                                </strong>
                                <span style="background: #667eea; color: #fff; padding: 3px 10px; border-radius: 12px; font-size: 0.75rem;">
                                    ID: {{ $comment->user->id }}
                                </span>
                            </div>
                            <p style="color: #b3b3b3; font-size: 0.9rem; margin-bottom: 5px;">
                                📧 {{ $comment->user->email }}
                            </p>
                            <p style="color: #b3b3b3; font-size: 0.9rem;">
                                🎬 Comentou em 
                                <a href="{{ route('movies.show', $comment->movie) }}" 
                                   style="color: #fff; text-decoration: underline;">
                                    {{ $comment->movie->title }}
                                </a>
                            </p>
                        </div>

                        <div style="text-align: right;">
                            <p style="color: #888; font-size: 0.85rem; margin-bottom: 5px;">
                                🕒 {{ $comment->created_at->format('d/m/Y H:i') }}
                            </p>
                            <p style="color: #666; font-size: 0.75rem;">
                                {{ $comment->created_at->diffForHumans() }}
                            </p>
                        </div>
                    </div>

                    {{-- CONTEÚDO DO COMENTÁRIO --}}
                    <div style="background: #1c1c1c; padding: 20px; border-radius: 8px; margin-bottom: 15px;">
                        <p style="color: #e0e0e0; line-height: 1.6; font-size: 1rem;">
                            "{{ $comment->content }}"
                        </p>
                    </div>

                    {{-- AÇÕES --}}
                    <div style="display: flex; gap: 15px; flex-wrap: wrap;">
                        <a href="{{ route('movies.show', $comment->movie) }}" 
                           style="background: #2196f3; color: #fff; padding: 10px 20px; border-radius: 6px; text-decoration: none; font-size: 0.9rem;">
                            👁️ Ver Filme
                        </a>

                        <form method="POST" action="{{ route('admin.comments.delete', $comment) }}" 
                              onsubmit="return confirm('Tens a certeza que queres apagar este comentário de {{ $comment->user->name }}?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    style="background: #f44336; color: #fff; padding: 10px 20px; border: none; border-radius: 6px; cursor: pointer; font-size: 0.9rem;">
                                🗑️ Apagar Comentário
                            </button>
                        </form>
                    </div>

                </div>
            @endforeach
        </div>
    </div>

    {{-- PAGINAÇÃO --}}
    <div style="margin-top: 30px;">
        {{ $comments->links() }}
    </div>

</div>

@endsection