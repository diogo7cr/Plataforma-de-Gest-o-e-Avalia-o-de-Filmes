@extends('layouts.main')

@section('content')

<div style="max-width: 1600px; margin: 40px auto; padding: 40px;">
    
    {{-- CABEÇALHO --}}
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px; flex-wrap: wrap; gap: 20px;">
        <div>
            <h1 style="font-size: 2.5rem; color: #e50914; margin-bottom: 10px;">
                🛠️ Painel Administrativo
            </h1>
            <p style="color: #b3b3b3;">
                Gestão completa do sistema MovieC
            </p>
        </div>
        
        {{-- BOTÕES DE EXPORTAÇÃO --}}
        <div style="display: flex; gap: 15px; flex-wrap: wrap;">
            <a href="{{ route('admin.export.users') }}" 
               style="background: #4caf50; color: #fff; padding: 12px 25px; border-radius: 6px; text-decoration: none; font-weight: bold; transition: all 0.3s;"
               onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 15px rgba(76,175,80,0.4)'"
               onmouseout="this.style.transform=''; this.style.boxShadow=''">
                📊 Exportar Utilizadores
            </a>
            <a href="{{ route('admin.export.movies') }}" 
               style="background: #2196f3; color: #fff; padding: 12px 25px; border-radius: 6px; text-decoration: none; font-weight: bold; transition: all 0.3s;"
               onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 15px rgba(33,150,243,0.4)'"
               onmouseout="this.style.transform=''; this.style.boxShadow=''">
                🎬 Exportar Filmes
            </a>
        </div>
    </div>

    {{-- ESTATÍSTICAS RÁPIDAS --}}
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 60px;">
        
        <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 30px; border-radius: 12px; text-align: center; box-shadow: 0 4px 15px rgba(0,0,0,0.3); transition: all 0.3s;"
             onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 8px 25px rgba(102,126,234,0.4)'"
             onmouseout="this.style.transform=''; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.3)'">
            <h3 style="font-size: 0.9rem; color: rgba(255,255,255,0.9); margin-bottom: 10px; text-transform: uppercase; letter-spacing: 1px;">
                👥 Utilizadores
            </h3>
            <p style="font-size: 3rem; font-weight: bold; color: #fff; margin: 10px 0;">
                {{ $stats['users'] }}
            </p>
            <p style="color: rgba(255,255,255,0.8); font-size: 0.85rem; margin-top: 5px;">
                {{ $stats['admins'] }} administradores
            </p>
        </div>

        <div style="background: linear-gradient(135deg, #e50914 0%, #b00710 100%); padding: 30px; border-radius: 12px; text-align: center; box-shadow: 0 4px 15px rgba(0,0,0,0.3); transition: all 0.3s;"
             onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 8px 25px rgba(229,9,20,0.4)'"
             onmouseout="this.style.transform=''; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.3)'">
            <h3 style="font-size: 0.9rem; color: rgba(255,255,255,0.9); margin-bottom: 10px; text-transform: uppercase; letter-spacing: 1px;">
                🎬 Filmes
            </h3>
            <p style="font-size: 3rem; font-weight: bold; color: #fff; margin: 10px 0;">
                {{ $stats['movies'] }}
            </p>
            <p style="color: rgba(255,255,255,0.8); font-size: 0.85rem; margin-top: 5px;">
                na base de dados
            </p>
        </div>

        <div style="background: linear-gradient(135deg, #4caf50 0%, #388e3c 100%); padding: 30px; border-radius: 12px; text-align: center; box-shadow: 0 4px 15px rgba(0,0,0,0.3); transition: all 0.3s;"
             onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 8px 25px rgba(76,175,80,0.4)'"
             onmouseout="this.style.transform=''; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.3)'">
            <h3 style="font-size: 0.9rem; color: rgba(255,255,255,0.9); margin-bottom: 10px; text-transform: uppercase; letter-spacing: 1px;">
                💬 Comentários
            </h3>
            <p style="font-size: 3rem; font-weight: bold; color: #fff; margin: 10px 0;">
                {{ $stats['comments'] }}
            </p>
            <p style="color: rgba(255,255,255,0.8); font-size: 0.85rem; margin-top: 5px;">
                total de opiniões
            </p>
        </div>

        <div style="background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%); padding: 30px; border-radius: 12px; text-align: center; box-shadow: 0 4px 15px rgba(0,0,0,0.3); transition: all 0.3s;"
             onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 8px 25px rgba(255,193,7,0.4)'"
             onmouseout="this.style.transform=''; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.3)'">
            <h3 style="font-size: 0.9rem; color: rgba(0,0,0,0.8); margin-bottom: 10px; text-transform: uppercase; letter-spacing: 1px;">
                ⭐ Avaliações
            </h3>
            <p style="font-size: 3rem; font-weight: bold; color: #000; margin: 10px 0;">
                {{ $stats['ratings'] }}
            </p>
            <p style="color: rgba(0,0,0,0.7); font-size: 0.85rem; margin-top: 5px;">
                estrelas atribuídas
            </p>
        </div>

        <div style="background: linear-gradient(135deg, #f44336 0%, #c62828 100%); padding: 30px; border-radius: 12px; text-align: center; box-shadow: 0 4px 15px rgba(0,0,0,0.3); transition: all 0.3s;"
             onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 8px 25px rgba(244,67,54,0.4)'"
             onmouseout="this.style.transform=''; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.3)'">
            <h3 style="font-size: 0.9rem; color: rgba(255,255,255,0.9); margin-bottom: 10px; text-transform: uppercase; letter-spacing: 1px;">
                ❤️ Favoritos
            </h3>
            <p style="font-size: 3rem; font-weight: bold; color: #fff; margin: 10px 0;">
                {{ $stats['favorites'] }}
            </p>
            <p style="color: rgba(255,255,255,0.8); font-size: 0.85rem; margin-top: 5px;">
                filmes marcados
            </p>
        </div>
    </div>

    {{-- MENU DE NAVEGAÇÃO ADMIN --}}
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-bottom: 60px;">
        
        <a href="{{ route('admin.users') }}" 
           style="background: #1c1c1c; padding: 30px; border-radius: 12px; text-decoration: none; border: 2px solid #333; transition: all 0.3s; box-shadow: 0 2px 10px rgba(0,0,0,0.3);"
           onmouseover="this.style.borderColor='#667eea'; this.style.transform='translateY(-5px)'; this.style.boxShadow='0 6px 20px rgba(102,126,234,0.3)'"
           onmouseout="this.style.borderColor='#333'; this.style.transform=''; this.style.boxShadow='0 2px 10px rgba(0,0,0,0.3)'">
            <h3 style="color: #667eea; font-size: 1.5rem; margin-bottom: 10px;">
                👥 Gestão de Utilizadores
            </h3>
            <p style="color: #b3b3b3; line-height: 1.5;">
                Ver, editar e gerir utilizadores da plataforma
            </p>
        </a>

        <a href="{{ route('admin.movies') }}" 
           style="background: #1c1c1c; padding: 30px; border-radius: 12px; text-decoration: none; border: 2px solid #333; transition: all 0.3s; box-shadow: 0 2px 10px rgba(0,0,0,0.3);"
           onmouseover="this.style.borderColor='#e50914'; this.style.transform='translateY(-5px)'; this.style.boxShadow='0 6px 20px rgba(229,9,20,0.3)'"
           onmouseout="this.style.borderColor='#333'; this.style.transform=''; this.style.boxShadow='0 2px 10px rgba(0,0,0,0.3)'">
            <h3 style="color: #e50914; font-size: 1.5rem; margin-bottom: 10px;">
                🎬 Gestão de Filmes
            </h3>
            <p style="color: #b3b3b3; line-height: 1.5;">
                Editar, adicionar e remover filmes do catálogo
            </p>
        </a>

        <a href="{{ route('admin.comments') }}" 
           style="background: #1c1c1c; padding: 30px; border-radius: 12px; text-decoration: none; border: 2px solid #333; transition: all 0.3s; box-shadow: 0 2px 10px rgba(0,0,0,0.3);"
           onmouseover="this.style.borderColor='#4caf50'; this.style.transform='translateY(-5px)'; this.style.boxShadow='0 6px 20px rgba(76,175,80,0.3)'"
           onmouseout="this.style.borderColor='#333'; this.style.transform=''; this.style.boxShadow='0 2px 10px rgba(0,0,0,0.3)'">
            <h3 style="color: #4caf50; font-size: 1.5rem; margin-bottom: 10px;">
                💬 Gestão de Comentários
            </h3>
            <p style="color: #b3b3b3; line-height: 1.5;">
                Moderar e remover comentários inapropriados
            </p>
        </a>
    </div>

    {{-- GRÁFICOS EM GRID --}}
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(500px, 1fr)); gap: 30px; margin-bottom: 40px;">
        
        {{-- GRÁFICO - TOP 5 FILMES MAIS AVALIADOS --}}
        <div style="background: #1c1c1c; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.3);">
            <h2 style="font-size: 1.8rem; color: #e50914; margin-bottom: 25px; display: flex; align-items: center; gap: 10px;">
                <span>🏆</span> Top 5 Filmes Mais Avaliados
            </h2>
            <div style="height: 300px;">
                <canvas id="topMoviesChart"></canvas>
            </div>
        </div>

        {{-- GRÁFICO - TOP 5 FILMES MAIS COMENTADOS --}}
        <div style="background: #1c1c1c; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.3);">
            <h2 style="font-size: 1.8rem; color: #4caf50; margin-bottom: 25px; display: flex; align-items: center; gap: 10px;">
                <span>💬</span> Top 5 Filmes Mais Comentados
            </h2>
            <div style="height: 300px;">
                <canvas id="topCommentedMoviesChart"></canvas>
            </div>
        </div>
    </div>

    {{-- GRÁFICOS LINHA 2 --}}
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(500px, 1fr)); gap: 30px; margin-bottom: 40px;">
        
        {{-- GRÁFICO - UTILIZADORES MAIS ATIVOS --}}
        <div style="background: #1c1c1c; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.3);">
            <h2 style="font-size: 1.8rem; color: #667eea; margin-bottom: 25px; display: flex; align-items: center; gap: 10px;">
                <span>🔥</span> Utilizadores Mais Ativos
            </h2>
            <div style="height: 300px;">
                <canvas id="activeUsersChart"></canvas>
            </div>
        </div>

        {{-- GRÁFICO - DISTRIBUIÇÃO DE AVALIAÇÕES --}}
        <div style="background: #1c1c1c; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.3);">
            <h2 style="font-size: 1.8rem; color: #ffc107; margin-bottom: 25px; display: flex; align-items: center; gap: 10px;">
                <span>⭐</span> Distribuição de Avaliações
            </h2>
            <div style="height: 300px;">
                <canvas id="ratingDistributionChart"></canvas>
            </div>
        </div>
    </div>

    {{-- UTILIZADORES RECENTES --}}
    <div style="background: #1c1c1c; padding: 30px; border-radius: 12px; margin-bottom: 40px; box-shadow: 0 4px 15px rgba(0,0,0,0.3);">
        <h2 style="font-size: 2rem; color: #667eea; margin-bottom: 30px; display: flex; align-items: center; gap: 10px;">
            <span>👥</span> Utilizadores Recentes
        </h2>

        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="border-bottom: 2px solid #333;">
                        <th style="padding: 15px; text-align: left; color: #b3b3b3; font-weight: bold;">ID</th>
                        <th style="padding: 15px; text-align: left; color: #b3b3b3; font-weight: bold;">Nome</th>
                        <th style="padding: 15px; text-align: left; color: #b3b3b3; font-weight: bold;">Email</th>
                        <th style="padding: 15px; text-align: center; color: #b3b3b3; font-weight: bold;">Admin</th>
                        <th style="padding: 15px; text-align: left; color: #b3b3b3; font-weight: bold;">Registado</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentUsers as $user)
                        <tr style="border-bottom: 1px solid #2a2a2a; transition: all 0.3s;"
                            onmouseover="this.style.backgroundColor='#2a2a2a'"
                            onmouseout="this.style.backgroundColor=''">
                            <td style="padding: 15px; color: #fff; font-weight: bold;">#{{ $user->id }}</td>
                            <td style="padding: 15px; color: #fff;">{{ $user->name }}</td>
                            <td style="padding: 15px; color: #b3b3b3;">{{ $user->email }}</td>
                            <td style="padding: 15px; text-align: center;">
                                @if($user->is_admin)
                                    <span style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: #fff; padding: 6px 16px; border-radius: 20px; font-size: 0.85rem; font-weight: bold;">
                                        ⚡ Admin
                                    </span>
                                @else
                                    <span style="background: #2a2a2a; color: #b3b3b3; padding: 6px 16px; border-radius: 20px; font-size: 0.85rem;">
                                        👤 User
                                    </span>
                                @endif
                            </td>
                            <td style="padding: 15px; color: #b3b3b3;">
                                {{ $user->created_at->diffForHumans() }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="padding: 30px; text-align: center; color: #888;">
                                Sem utilizadores registados ainda.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- COMENTÁRIOS RECENTES --}}
    <div style="background: #1c1c1c; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.3);">
        <h2 style="font-size: 2rem; color: #4caf50; margin-bottom: 30px; display: flex; align-items: center; gap: 10px;">
            <span>💬</span> Comentários Recentes
        </h2>

        <div style="display: grid; gap: 15px;">
            @forelse($recentComments as $comment)
                <div style="background: #2a2a2a; padding: 20px; border-radius: 8px; border-left: 4px solid #4caf50; transition: all 0.3s;"
                     onmouseover="this.style.transform='translateX(5px)'; this.style.backgroundColor='#333'"
                     onmouseout="this.style.transform=''; this.style.backgroundColor='#2a2a2a'">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 10px; flex-wrap: wrap; gap: 10px;">
                        <strong style="color: #4caf50; font-size: 1.1rem;">{{ $comment->user->name }}</strong>
                        <span style="color: #888; font-size: 0.85rem;">
                            🕒 {{ $comment->created_at->diffForHumans() }}
                        </span>
                    </div>
                    <p style="color: #b3b3b3; margin-bottom: 10px; font-size: 0.9rem;">
                        em <a href="{{ route('movies.show', $comment->movie) }}" 
                              style="color: #fff; text-decoration: none; font-weight: bold; border-bottom: 2px solid #e50914;"
                              onmouseover="this.style.color='#e50914'"
                              onmouseout="this.style.color='#fff'">
                            🎬 {{ $comment->movie->title }}
                        </a>
                    </p>
                    <p style="color: #e0e0e0; line-height: 1.6; font-style: italic;">
                        "{{ $comment->content }}"
                    </p>
                </div>
            @empty
                <div style="background: #2a2a2a; padding: 40px; border-radius: 8px; text-align: center;">
                    <p style="color: #888; font-size: 1.1rem;">
                        😴 Ainda não há comentários no sistema.
                    </p>
                </div>
            @endforelse
        </div>
    </div>

</div>

{{-- CHART.JS --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
    // GRÁFICO 1: Top 5 Filmes Mais Avaliados
    const ctx1 = document.getElementById('topMoviesChart').getContext('2d');
    new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: [
                @foreach($topMovies as $movie)
                    '{{ $movie->title }}',
                @endforeach
            ],
            datasets: [{
                label: 'Número de Avaliações',
                data: [
                    @foreach($topMovies as $movie)
                        {{ $movie->ratings_count }},
                    @endforeach
                ],
                backgroundColor: '#e50914',
                borderColor: '#b00710',
                borderWidth: 2,
                borderRadius: 8,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    labels: {
                        color: '#fff',
                        font: { size: 14, weight: 'bold' }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { color: '#b3b3b3', font: { size: 12 } },
                    grid: { color: '#333' }
                },
                x: {
                    ticks: { color: '#b3b3b3', font: { size: 12 } },
                    grid: { color: '#333' }
                }
            }
        }
    });

    // GRÁFICO 2: Top 5 Filmes Mais Comentados
    const ctx2 = document.getElementById('topCommentedMoviesChart').getContext('2d');
    new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: [
                @foreach($topCommentedMovies as $movie)
                    '{{ $movie->title }}',
                @endforeach
            ],
            datasets: [{
                label: 'Número de Comentários',
                data: [
                    @foreach($topCommentedMovies as $movie)
                        {{ $movie->comments_count }},
                    @endforeach
                ],
                backgroundColor: '#4caf50',
                borderColor: '#388e3c',
                borderWidth: 2,
                borderRadius: 8,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    labels: {
                        color: '#fff',
                        font: { size: 14, weight: 'bold' }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { color: '#b3b3b3', font: { size: 12 } },
                    grid: { color: '#333' }
                },
                x: {
                    ticks: { color: '#b3b3b3', font: { size: 12 } },
                    grid: { color: '#333' }
                }
            }
        }
    });

    // GRÁFICO 3: Utilizadores Mais Ativos
    const ctx3 = document.getElementById('activeUsersChart').getContext('2d');
    new Chart(ctx3, {
        type: 'doughnut',
        data: {
            labels: [
                @foreach($activeUsers as $user)
                    '{{ $user->name }}',
                @endforeach
            ],
            datasets: [{
                data: [
                    @foreach($activeUsers as $user)
                        {{ $user->comments_count }},
                    @endforeach
                ],
                backgroundColor: [
                    '#667eea',
                    '#764ba2',
                    '#e50914',
                    '#ffc107',
                    '#4caf50'
                ],
                borderColor: '#1c1c1c',
                borderWidth: 3
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'right',
                    labels: {
                        color: '#fff',
                        padding: 15,
                        font: { size: 13, weight: 'bold' }
                    }
                }
            }
        }
    });

    // GRÁFICO 4: Distribuição de Avaliações
    const ctx4 = document.getElementById('ratingDistributionChart').getContext('2d');
    new Chart(ctx4, {
        type: 'pie',
        data: {
            labels: [
                @foreach($ratingDistribution as $rating)
                    '{{ $rating->rating }} ⭐',
                @endforeach
            ],
            datasets: [{
                data: [
                    @foreach($ratingDistribution as $rating)
                        {{ $rating->count }},
                    @endforeach
                ],
                backgroundColor: [
                    '#f44336',
                    '#ff9800',
                    '#ffc107',
                    '#8bc34a',
                    '#4caf50'
                ],
                borderColor: '#1c1c1c',
                borderWidth: 3
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        color: '#fff',
                        padding: 15,
                        font: { size: 14, weight: 'bold' }
                    }
                }
            }
        }
    });
</script>

@endsection