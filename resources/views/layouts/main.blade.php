<!DOCTYPE html>
<html lang="pt" id="html-root">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'MovieC') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        /* DARK/LIGHT MODE VARIABLES */
        :root {
            --bg-primary: #141414;
            --bg-secondary: #1c1c1c;
            --bg-tertiary: #2a2a2a;
            --text-primary: #fff;
            --text-secondary: #b3b3b3;
            --border-color: #333;
            --accent-color: #e50914;
        }

        [data-theme="light"] {
            --bg-primary: #f5f5f5;
            --bg-secondary: #ffffff;
            --bg-tertiary: #e0e0e0;
            --text-primary: #1a1a1a;
            --text-secondary: #666;
            --border-color: #ddd;
            --accent-color: #e50914;
        }

        body {
            background: var(--bg-primary);
            color: var(--text-primary);
            transition: background 0.3s, color 0.3s;
            margin: 0;
            padding: 0;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        }

        /* NAVBAR */
        .navbar {
            background: var(--bg-secondary);
            border-bottom: 1px solid var(--border-color);
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .navbar h1 {
            margin: 0;
            color: var(--accent-color);
            font-size: 1.8rem;
            font-weight: bold;
        }

        .navbar a {
            color: var(--text-primary);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .navbar a:hover {
            color: var(--accent-color);
        }

        /* THEME TOGGLE BUTTON */
        .theme-toggle {
            position: relative;
            width: 60px;
            height: 30px;
            background: var(--bg-tertiary);
            border-radius: 30px;
            cursor: pointer;
            transition: background 0.3s;
            border: 2px solid var(--border-color);
        }

        .theme-toggle-slider {
            position: absolute;
            top: 3px;
            left: 3px;
            width: 22px;
            height: 22px;
            background: var(--accent-color);
            border-radius: 50%;
            transition: transform 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
        }

        [data-theme="light"] .theme-toggle-slider {
            transform: translateX(30px);
        }

        /* DROPDOWN */
        .user-dropdown {
            position: relative;
            display: inline-block;
        }

        .user-btn {
            display: flex;
            align-items: center;
            gap: 10px;
            background: transparent;
            border: 2px solid var(--accent-color);
            color: var(--text-primary);
            padding: 8px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s;
            font-size: 1rem;
        }

        .user-btn:hover {
            background: var(--accent-color);
            color: #fff;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            right: 0;
            top: 100%;
            margin-top: 10px;
            background: var(--bg-secondary);
            min-width: 250px;
            border-radius: 8px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.3);
            z-index: 1000;
            border: 1px solid var(--border-color);
        }

        .user-dropdown.active .dropdown-menu {
            display: block;
            animation: fadeIn 0.2s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .dropdown-header {
            padding: 20px;
            border-bottom: 1px solid var(--border-color);
        }

        .dropdown-header p {
            margin: 0;
            color: var(--text-secondary);
            font-size: 0.9rem;
        }

        .dropdown-header h4 {
            margin: 5px 0 0;
            color: var(--text-primary);
            font-size: 1.2rem;
        }

        .dropdown-item {
            display: block;
            padding: 15px 20px;
            color: var(--text-primary);
            text-decoration: none;
            transition: background 0.3s;
            border-bottom: 1px solid var(--border-color);
            font-size: 0.95rem;
        }

        .dropdown-item:hover {
            background: var(--bg-tertiary);
        }

        .dropdown-item.logout {
            color: var(--text-primary);
            font-weight: bold;
            border-bottom: none;
            background: transparent;
        }

        .dropdown-item.logout:hover {
            background: var(--bg-tertiary);
            color: var(--accent-color);
        }

        .dropdown-item.admin {
            background: rgba(229, 9, 20, 0.1);
            border-left: 3px solid var(--accent-color);
        }

        .dropdown-item.admin:hover {
            background: rgba(229, 9, 20, 0.2);
        }

        /* MAIN CONTENT */
        main {
            min-height: calc(100vh - 81px);
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <h1>🎬 Movie Diogo</h1>
        <div style="display: flex; gap: 30px; align-items: center;">
            <a href="{{ route('home') }}">Início</a>
            <a href="{{ route('about') }}">Sobre</a>
            <a href="{{ route('saiba-mais') }}">Saiba Mais</a>
            
            @auth
                <a href="{{ route('dashboard') }}">Dashboard</a>
                
                {{-- THEME TOGGLE --}}
                <div class="theme-toggle" onclick="toggleTheme()" title="Alternar tema">
                    <div class="theme-toggle-slider" id="theme-slider">
                        🌙
                    </div>
                </div>
                
                {{-- Dropdown Perfil --}}
                <div class="user-dropdown" id="userDropdown">
                    <button class="user-btn" onclick="toggleDropdown()">
                        <span>👤</span>
                        <span>{{ auth()->user()->name }}</span>
                        <span>▼</span>
                    </button>
                    
                    <div class="dropdown-menu">
                        <div class="dropdown-header">
                            <p>Conectado como</p>
                            <h4>{{ auth()->user()->name }}</h4>
                            <p style="margin-top: 5px; font-size: 0.85rem;">{{ auth()->user()->email }}</p>
                        </div>
                        
                        <a href="{{ route('profile.edit') }}" class="dropdown-item">
                            ⚙️ Editar Perfil
                        </a>
                        
                        <a href="{{ route('dashboard') }}" class="dropdown-item">
                            📊 Meu Dashboard
                        </a>
                        
                        @if(auth()->user()->is_admin)
                            <a href="{{ route('admin.dashboard') }}" class="dropdown-item admin">
                                👑 Painel Admin
                            </a>
                            <a href="{{ route('admin.movies') }}" class="dropdown-item admin">
                                🎬 Gestão de Filmes
                            </a>
                        @endif
                        
                        <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                            @csrf
                            <button type="submit" class="dropdown-item logout" style="width: 100%; text-align: left; border: none; cursor: pointer;">
                                🚪 Sair
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}" style="background: var(--accent-color); color: #fff; padding: 10px 25px; border-radius: 6px; font-weight: bold;">
                    Registar
                </a>
            @endauth
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <script>
        // DROPDOWN
        function toggleDropdown() {
            const dropdown = document.getElementById('userDropdown');
            dropdown.classList.toggle('active');
        }

        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('userDropdown');
            if (!dropdown.contains(event.target)) {
                dropdown.classList.remove('active');
            }
        });

        // DARK/LIGHT MODE
        function toggleTheme() {
            const html = document.getElementById('html-root');
            const slider = document.getElementById('theme-slider');
            const currentTheme = html.getAttribute('data-theme');
            
            if (currentTheme === 'light') {
                html.setAttribute('data-theme', 'dark');
                slider.textContent = '🌙';
                localStorage.setItem('theme', 'dark');
            } else {
                html.setAttribute('data-theme', 'light');
                slider.textContent = '☀️';
                localStorage.setItem('theme', 'light');
            }
        }

        // CARREGAR TEMA SALVO
        document.addEventListener('DOMContentLoaded', function() {
            const savedTheme = localStorage.getItem('theme') || 'dark';
            const html = document.getElementById('html-root');
            const slider = document.getElementById('theme-slider');
            
            html.setAttribute('data-theme', savedTheme);
            slider.textContent = savedTheme === 'light' ? '☀️' : '🌙';
        });
    </script>

</body>
</html>