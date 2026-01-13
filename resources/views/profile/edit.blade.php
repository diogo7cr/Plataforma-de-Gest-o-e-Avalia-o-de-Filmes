@extends('layouts.main')

@section('content')

<div style="max-width: 800px; margin: 40px auto; padding: 40px;">
    
    <h1 style="font-size: 2.5rem; margin-bottom: 40px; color: #fff;">
        ⚙️ Editar Perfil
    </h1>

    {{-- Mensagens de Sucesso --}}
    @if (session('status') === 'profile-updated')
        <div style="background: #155724; color: #d4edda; padding: 15px; border-radius: 6px; margin-bottom: 20px; border: 1px solid #c3e6cb;">
            ✅ Perfil atualizado com sucesso!
        </div>
    @endif

    @if (session('status') === 'password-updated')
        <div style="background: #155724; color: #d4edda; padding: 15px; border-radius: 6px; margin-bottom: 20px; border: 1px solid #c3e6cb;">
            ✅ Password atualizada com sucesso!
        </div>
    @endif

    {{-- ATUALIZAR INFORMAÇÕES DO PERFIL --}}
    <div style="background: #1c1c1c; padding: 30px; border-radius: 8px; margin-bottom: 30px;">
        <h2 style="font-size: 1.8rem; color: #e50914; margin-bottom: 20px;">
            Informações do Perfil
        </h2>

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PATCH')

            {{-- Nome --}}
            <div style="margin-bottom: 20px;">
                <label for="name" style="display: block; margin-bottom: 8px; color: #b3b3b3; font-weight: bold;">
                    Nome
                </label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    value="{{ old('name', $user->name) }}" 
                    required
                    style="width: 100%; padding: 15px; background: #2a2a2a; border: 1px solid #3a3a3a; border-radius: 6px; color: #fff; font-size: 1rem;">
                @error('name')
                    <p style="color: #e50914; margin-top: 5px; font-size: 0.9rem;">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div style="margin-bottom: 20px;">
                <label for="email" style="display: block; margin-bottom: 8px; color: #b3b3b3; font-weight: bold;">
                    Email
                </label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    value="{{ old('email', $user->email) }}" 
                    required
                    style="width: 100%; padding: 15px; background: #2a2a2a; border: 1px solid #3a3a3a; border-radius: 6px; color: #fff; font-size: 1rem;">
                @error('email')
                    <p style="color: #e50914; margin-top: 5px; font-size: 0.9rem;">{{ $message }}</p>
                @enderror
            </div>

            <button 
                type="submit" 
                style="background: #e50914; color: #fff; padding: 12px 30px; border: none; border-radius: 6px; cursor: pointer; font-weight: bold; font-size: 1rem; transition: background 0.3s;">
                Guardar Alterações
            </button>
        </form>
    </div>

    {{-- ATUALIZAR PASSWORD --}}
    <div style="background: #1c1c1c; padding: 30px; border-radius: 8px; margin-bottom: 30px;">
        <h2 style="font-size: 1.8rem; color: #e50914; margin-bottom: 20px;">
            Alterar Password
        </h2>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            @method('PUT')

            {{-- Password Atual --}}
            <div style="margin-bottom: 20px;">
                <label for="current_password" style="display: block; margin-bottom: 8px; color: #b3b3b3; font-weight: bold;">
                    Password Atual
                </label>
                <input 
                    type="password" 
                    id="current_password" 
                    name="current_password" 
                    required
                    autocomplete="current-password"
                    style="width: 100%; padding: 15px; background: #2a2a2a; border: 1px solid #3a3a3a; border-radius: 6px; color: #fff; font-size: 1rem;">
                @error('current_password')
                    <p style="color: #e50914; margin-top: 5px; font-size: 0.9rem;">{{ $message }}</p>
                @enderror
            </div>

            {{-- Nova Password --}}
            <div style="margin-bottom: 20px;">
                <label for="password" style="display: block; margin-bottom: 8px; color: #b3b3b3; font-weight: bold;">
                    Nova Password
                </label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    required
                    autocomplete="new-password"
                    style="width: 100%; padding: 15px; background: #2a2a2a; border: 1px solid #3a3a3a; border-radius: 6px; color: #fff; font-size: 1rem;">
                @error('password')
                    <p style="color: #e50914; margin-top: 5px; font-size: 0.9rem;">{{ $message }}</p>
                @enderror
            </div>

            {{-- Confirmar Password --}}
            <div style="margin-bottom: 20px;">
                <label for="password_confirmation" style="display: block; margin-bottom: 8px; color: #b3b3b3; font-weight: bold;">
                    Confirmar Nova Password
                </label>
                <input 
                    type="password" 
                    id="password_confirmation" 
                    name="password_confirmation" 
                    required
                    autocomplete="new-password"
                    style="width: 100%; padding: 15px; background: #2a2a2a; border: 1px solid #3a3a3a; border-radius: 6px; color: #fff; font-size: 1rem;">
            </div>

            <button 
                type="submit" 
                style="background: #e50914; color: #fff; padding: 12px 30px; border: none; border-radius: 6px; cursor: pointer; font-weight: bold; font-size: 1rem; transition: background 0.3s;">
                Atualizar Password
            </button>
        </form>
    </div>

    {{-- APAGAR CONTA --}}
    <div style="background: #1c1c1c; padding: 30px; border-radius: 8px; border: 2px solid #dc3545;">
        <h2 style="font-size: 1.8rem; color: #dc3545; margin-bottom: 20px;">
            ⚠️ Zona Perigosa
        </h2>

        <p style="color: #b3b3b3; margin-bottom: 20px;">
            Ao apagar a tua conta, todos os teus dados serão permanentemente removidos. Esta ação não pode ser revertida.
        </p>

        <form method="POST" action="{{ route('profile.destroy') }}" onsubmit="return confirm('Tens a certeza que queres apagar a conta? Esta ação é irreversível!');">
            @csrf
            @method('DELETE')

            <button 
                type="submit" 
                style="background: #dc3545; color: #fff; padding: 12px 30px; border: none; border-radius: 6px; cursor: pointer; font-weight: bold; font-size: 1rem; transition: background 0.3s;">
                Apagar Conta
            </button>
        </form>
    </div>

    {{-- Voltar ao Dashboard --}}
    <div style="margin-top: 30px; text-align: center;">
        <a href="{{ route('dashboard') }}" style="color: #e50914; text-decoration: none; font-size: 1.1rem;">
            ← Voltar ao Dashboard
        </a>
    </div>

</div>

@endsection
