<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>MovieC</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<nav class="navbar">
    <h1>🎬 MovieC</h1>
    <div>
        <a href="/">Home</a>
        @auth
            <a href="/dashboard">Dashboard</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button>Sair</button>
            </form>
        @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Registar</a>
        @endauth
    </div>
</nav>

<main>
    @yield('content')
</main>

</body>
</html>
