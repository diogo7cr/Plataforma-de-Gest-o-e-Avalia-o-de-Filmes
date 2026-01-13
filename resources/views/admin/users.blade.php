@extends('layouts.main')

@section('content')

<div style="max-width: 1600px; margin: 40px auto; padding: 40px;">
    
    {{-- CABEÇALHO --}}
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px;">
        <h1 style="font-size: 2.5rem; color: #667eea;">
            👥 Gestão de Utilizadores
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

    @if(session('error'))
        <div style="background: #f44336; color: #fff; padding: 15px 20px; border-radius: 6px; margin-bottom: 20px;">
            ❌ {{ session('error') }}
        </div>
    @endif

    {{-- TABELA DE UTILIZADORES --}}
    <div style="background: #1c1c1c; padding: 30px; border-radius: 12px; overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="border-bottom: 2px solid #333;">
                    <th style="padding: 15px; text-align: left; color: #b3b3b3;">ID</th>
                    <th style="padding: 15px; text-align: left; color: #b3b3b3;">Nome</th>
                    <th style="padding: 15px; text-align: left; color: #b3b3b3;">Email</th>
                    <th style="padding: 15px; text-align: left; color: #b3b3b3;">Tipo</th>
                    <th style="padding: 15px; text-align: center; color: #b3b3b3;">Comentários</th>
                    <th style="padding: 15px; text-align: center; color: #b3b3b3;">Avaliações</th>
                    <th style="padding: 15px; text-align: center; color: #b3b3b3;">Favoritos</th>
                    <th style="padding: 15px; text-align: center; color: #b3b3b3;">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr style="border-bottom: 1px solid #2a2a2a;">
                        <td style="padding: 15px; color: #fff;">{{ $user->id }}</td>
                        <td style="padding: 15px; color: #fff;">{{ $user->name }}</td>
                        <td style="padding: 15px; color: #b3b3b3;">{{ $user->email }}</td>
                        <td style="padding: 15px;">
                            @if($user->is_admin)
                                <span style="background: #667eea; color: #fff; padding: 5px 15px; border-radius: 20px; font-size: 0.85rem;">
                                    🛠️ Admin
                                </span>
                            @else
                                <span style="background: #2a2a2a; color: #b3b3b3; padding: 5px 15px; border-radius: 20px; font-size: 0.85rem;">
                                    👤 User
                                </span>
                            @endif
                        </td>
                        <td style="padding: 15px; text-align: center; color: #fff;">{{ $user->comments_count }}</td>
                        <td style="padding: 15px; text-align: center; color: #fff;">{{ $user->ratings_count }}</td>
                        <td style="padding: 15px; text-align: center; color: #fff;">{{ $user->favorites_count }}</td>
                        <td style="padding: 15px; text-align: center;">
                            <div style="display: flex; gap: 10px; justify-content: center;">
                                {{-- Toggle Admin --}}
                                <form method="POST" action="{{ route('admin.users.toggle-admin', $user) }}">
                                    @csrf
                                    <button type="submit" 
                                            style="background: {{ $user->is_admin ? '#ffc107' : '#667eea' }}; color: #fff; padding: 8px 15px; border: none; border-radius: 4px; cursor: pointer; font-size: 0.85rem;">
                                        {{ $user->is_admin ? '⬇️ Remover Admin' : '⬆️ Tornar Admin' }}
                                    </button>
                                </form>

                                {{-- Apagar --}}
                                @if($user->id !== auth()->id())
                                    <form method="POST" action="{{ route('admin.users.delete', $user) }}" 
                                          onsubmit="return confirm('Tens a certeza que queres apagar {{ $user->name }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                style="background: #f44336; color: #fff; padding: 8px 15px; border: none; border-radius: 4px; cursor: pointer; font-size: 0.85rem;">
                                            🗑️ Apagar
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- PAGINAÇÃO --}}
    <div style="margin-top: 30px;">
        {{ $users->links() }}
    </div>

</div>

@endsection