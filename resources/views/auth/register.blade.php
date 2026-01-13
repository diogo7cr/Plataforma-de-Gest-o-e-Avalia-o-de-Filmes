<x-guest-layout>
    <h2>Criar Conta</h2>

    @if ($errors->any())
        <div class="error">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <label for="name">Nome</label>
            <input id="name" 
                   type="text" 
                   name="name" 
                   value="{{ old('name') }}" 
                   required 
                   autofocus
                   placeholder="O teu nome">
        </div>

        <!-- Email -->
        <div>
            <label for="email">Email</label>
            <input id="email" 
                   type="email" 
                   name="email" 
                   value="{{ old('email') }}" 
                   required
                   placeholder="nome@exemplo.com">
        </div>

        <!-- Password -->
        <div>
            <label for="password">Password</label>
            <input id="password" 
                   type="password" 
                   name="password" 
                   required
                   placeholder="Mínimo 8 caracteres">
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation">Confirmar Password</label>
            <input id="password_confirmation" 
                   type="password" 
                   name="password_confirmation" 
                   required
                   placeholder="Repete a password">
        </div>

        <button type="submit">Registar</button>

        <div class="links">
            <a href="{{ route('login') }}" style="color: #fff;">
                ← Já tens conta? Entra aqui
            </a>
        </div>
    </form>
</x-guest-layout>
