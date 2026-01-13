<x-guest-layout>
    <h2>Entrar</h2>

    <!-- Session Status -->
    @if (session('status'))
        <div class="error">
            {{ session('status') }}
        </div>
    @endif

    <!-- Validation Errors -->
    @if ($errors->any())
        <div class="error">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div>
            <label for="email">Email</label>
            <input id="email" 
                   type="email" 
                   name="email" 
                   value="{{ old('email') }}" 
                   required 
                   autofocus 
                   placeholder="nome@exemplo.com">
        </div>

        <!-- Password -->
        <div>
            <label for="password">Password</label>
            <input id="password" 
                   type="password" 
                   name="password" 
                   required 
                   placeholder="••••••••">
        </div>

        <!-- Remember Me -->
        <div class="checkbox-container">
            <input id="remember_me" type="checkbox" name="remember">
            <label for="remember_me">Lembrar-me</label>
        </div>

        <button type="submit">Entrar</button>

        <div class="links">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    Esqueceste-te da password?
                </a>
            @endif
        </div>

        <div class="divider">───────  ou  ───────</div>

        <div class="links">
            <a href="{{ route('register') }}" style="font-size: 1rem; color: #fff;">
                Criar nova conta →
            </a>
        </div>
    </form>
</x-guest-layout>