@extends('layouts.main')

@section('content')

<div style="max-width: 1200px; margin: 0 auto; padding: 60px 40px;">

    {{-- HERO SECTION --}}
    <div style="text-align: center; margin-bottom: 80px;">
        <h1 style="font-size: 3.5rem; color: var(--accent-color); margin-bottom: 20px; font-weight: bold;">
            🎬 Sobre o Movie Diogo
        </h1>
        <p style="font-size: 1.3rem; color: var(--text-secondary); max-width: 800px; margin: 0 auto; line-height: 1.8;">
            A sua plataforma definitiva para descobrir, avaliar e partilhar opiniões sobre os melhores filmes do mundo.
        </p>
    </div>

    {{-- MISSÃO --}}
    <div style="background: var(--bg-secondary); padding: 50px; border-radius: 12px; margin-bottom: 40px; border-left: 5px solid var(--accent-color);">
        <h2 style="font-size: 2.2rem; color: var(--accent-color); margin-bottom: 25px; display: flex; align-items: center; gap: 15px;">
            <span style="font-size: 2.5rem;">🎯</span> Nossa Missão
        </h2>
        <p style="font-size: 1.15rem; color: var(--text-primary); line-height: 1.9; margin-bottom: 20px;">
            No MovieC, acreditamos que o cinema é mais do que entretenimento – é arte, cultura e emoção. A nossa missão é criar uma comunidade apaixonada por filmes, onde cada opinião conta e cada descoberta é uma nova aventura cinematográfica.
        </p>
        <p style="font-size: 1.15rem; color: var(--text-primary); line-height: 1.9;">
            Queremos ser o seu guia pessoal no vasto universo do cinema, ajudando-o a encontrar desde grandes clássicos até as mais recentes estreias, tudo num só lugar.
        </p>
    </div>

    {{-- FUNCIONALIDADES --}}
    <div style="margin-bottom: 60px;">
        <h2 style="font-size: 2.5rem; color: var(--text-primary); margin-bottom: 40px; text-align: center; font-weight: bold;">
            ✨ O Que Oferecemos
        </h2>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 30px;">
            
            {{-- Card 1 --}}
            <div style="background: var(--bg-secondary); padding: 35px; border-radius: 12px; text-align: center; transition: transform 0.3s, box-shadow 0.3s; border: 2px solid transparent;" onmouseover="this.style.transform='translateY(-10px)'; this.style.borderColor='var(--accent-color)'; this.style.boxShadow='0 10px 30px rgba(229,9,20,0.3)';" onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='transparent'; this.style.boxShadow='none';">
                <div style="font-size: 4rem; margin-bottom: 20px;">🔍</div>
                <h3 style="font-size: 1.5rem; color: var(--accent-color); margin-bottom: 15px; font-weight: bold;">Pesquisa Avançada</h3>
                <p style="color: var(--text-secondary); line-height: 1.7; font-size: 1rem;">
                    Encontre filmes por título, género, ano ou avaliação. Filtre e descubra exatamente o que procura.
                </p>
            </div>

            {{-- Card 2 --}}
            <div style="background: var(--bg-secondary); padding: 35px; border-radius: 12px; text-align: center; transition: transform 0.3s, box-shadow 0.3s; border: 2px solid transparent;" onmouseover="this.style.transform='translateY(-10px)'; this.style.borderColor='var(--accent-color)'; this.style.boxShadow='0 10px 30px rgba(229,9,20,0.3)';" onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='transparent'; this.style.boxShadow='none';">
                <div style="font-size: 4rem; margin-bottom: 20px;">⭐</div>
                <h3 style="font-size: 1.5rem; color: var(--accent-color); margin-bottom: 15px; font-weight: bold;">Avaliações</h3>
                <p style="color: var(--text-secondary); line-height: 1.7; font-size: 1rem;">
                    Avalie filmes de 1 a 5 estrelas e veja as médias da comunidade. A sua opinião importa!
                </p>
            </div>

            {{-- Card 3 --}}
            <div style="background: var(--bg-secondary); padding: 35px; border-radius: 12px; text-align: center; transition: transform 0.3s, box-shadow 0.3s; border: 2px solid transparent;" onmouseover="this.style.transform='translateY(-10px)'; this.style.borderColor='var(--accent-color)'; this.style.boxShadow='0 10px 30px rgba(229,9,20,0.3)';" onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='transparent'; this.style.boxShadow='none';">
                <div style="font-size: 4rem; margin-bottom: 20px;">💬</div>
                <h3 style="font-size: 1.5rem; color: var(--accent-color); margin-bottom: 15px; font-weight: bold;">Comentários</h3>
                <p style="color: var(--text-secondary); line-height: 1.7; font-size: 1rem;">
                    Partilhe as suas críticas e opiniões detalhadas. Junte-se à discussão sobre os seus filmes favoritos.
                </p>
            </div>

            {{-- Card 4 --}}
            <div style="background: var(--bg-secondary); padding: 35px; border-radius: 12px; text-align: center; transition: transform 0.3s, box-shadow 0.3s; border: 2px solid transparent;" onmouseover="this.style.transform='translateY(-10px)'; this.style.borderColor='var(--accent-color)'; this.style.boxShadow='0 10px 30px rgba(229,9,20,0.3)';" onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='transparent'; this.style.boxShadow='none';">
                <div style="font-size: 4rem; margin-bottom: 20px;">❤️</div>
                <h3 style="font-size: 1.5rem; color: var(--accent-color); margin-bottom: 15px; font-weight: bold;">Favoritos</h3>
                <p style="color: var(--text-secondary); line-height: 1.7; font-size: 1rem;">
                    Crie a sua lista pessoal de filmes favoritos e aceda-os rapidamente sempre que quiser.
                </p>
            </div>

            {{-- Card 5 --}}
            <div style="background: var(--bg-secondary); padding: 35px; border-radius: 12px; text-align: center; transition: transform 0.3s, box-shadow 0.3s; border: 2px solid transparent;" onmouseover="this.style.transform='translateY(-10px)'; this.style.borderColor='var(--accent-color)'; this.style.boxShadow='0 10px 30px rgba(229,9,20,0.3)';" onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='transparent'; this.style.boxShadow='none';">
                <div style="font-size: 4rem; margin-bottom: 20px;">🌓</div>
                <h3 style="font-size: 1.5rem; color: var(--accent-color); margin-bottom: 15px; font-weight: bold;">Tema Dark/Light</h3>
                <p style="color: var(--text-secondary); line-height: 1.7; font-size: 1rem;">
                    Escolha entre modo escuro ou claro para uma experiência visual perfeita a qualquer hora.
                </p>
            </div>

            {{-- Card 6 --}}
            <div style="background: var(--bg-secondary); padding: 35px; border-radius: 12px; text-align: center; transition: transform 0.3s, box-shadow 0.3s; border: 2px solid transparent;" onmouseover="this.style.transform='translateY(-10px)'; this.style.borderColor='var(--accent-color)'; this.style.boxShadow='0 10px 30px rgba(229,9,20,0.3)';" onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='transparent'; this.style.boxShadow='none';">
                <div style="font-size: 4rem; margin-bottom: 20px;">📱</div>
                <h3 style="font-size: 1.5rem; color: var(--accent-color); margin-bottom: 15px; font-weight: bold;">Totalmente Responsivo</h3>
                <p style="color: var(--text-secondary); line-height: 1.7; font-size: 1rem;">
                    Acesse de qualquer dispositivo – computador, tablet ou smartphone. O MovieC adapta-se a si.
                </p>
            </div>

        </div>
    </div>

    {{-- ESTATÍSTICAS --}}
    <div style="background: linear-gradient(135deg, var(--accent-color) 0%, #b20710 100%); padding: 60px 40px; border-radius: 12px; margin-bottom: 60px; text-align: center;">
        <h2 style="font-size: 2.5rem; color: #fff; margin-bottom: 40px; font-weight: bold;">
            📊 MovieC em Números
        </h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 30px;">
            <div>
                <div style="font-size: 3.5rem; color: #fff; font-weight: bold; margin-bottom: 10px;">{{ \App\Models\Movie::count() }}+</div>
                <div style="font-size: 1.2rem; color: rgba(255,255,255,0.9);">Filmes no Catálogo</div>
            </div>
            <div>
                <div style="font-size: 3.5rem; color: #fff; font-weight: bold; margin-bottom: 10px;">{{ \App\Models\User::count() }}+</div>
                <div style="font-size: 1.2rem; color: rgba(255,255,255,0.9);">Utilizadores Ativos</div>
            </div>
            <div>
                <div style="font-size: 3.5rem; color: #fff; font-weight: bold; margin-bottom: 10px;">{{ \App\Models\Comment::count() }}+</div>
                <div style="font-size: 1.2rem; color: rgba(255,255,255,0.9);">Comentários Publicados</div>
            </div>
            <div>
                <div style="font-size: 3.5rem; color: #fff; font-weight: bold; margin-bottom: 10px;">{{ \App\Models\Rating::count() }}+</div>
                <div style="font-size: 1.2rem; color: rgba(255,255,255,0.9);">Avaliações Realizadas</div>
            </div>
        </div>
    </div>

    {{-- TECNOLOGIA --}}
    <div style="background: var(--bg-secondary); padding: 50px; border-radius: 12px; margin-bottom: 60px;">
        <h2 style="font-size: 2.5rem; color: var(--accent-color); margin-bottom: 30px; text-align: center; font-weight: bold;">
            🚀 Tecnologia de Ponta
        </h2>
        <p style="font-size: 1.15rem; color: var(--text-primary); line-height: 1.9; text-align: center; max-width: 800px; margin: 0 auto 30px;">
            O MovieC é construído com as tecnologias web mais modernas para garantir uma experiência rápida, segura e intuitiva.
        </p>
        <div style="display: flex; justify-content: center; gap: 40px; flex-wrap: wrap; margin-top: 40px;">
            <div style="text-align: center;">
                <div style="font-size: 3rem; margin-bottom: 10px;">🐘</div>
                <div style="color: var(--text-primary); font-weight: bold;">Laravel</div>
            </div>
            <div style="text-align: center;">
                <div style="font-size: 3rem; margin-bottom: 10px;">🗄️</div>
                <div style="color: var(--text-primary); font-weight: bold;">SQLite</div>
            </div>
            <div style="text-align: center;">
                <div style="font-size: 3rem; margin-bottom: 10px;">🎨</div>
                <div style="color: var(--text-primary); font-weight: bold;">CSS Moderno</div>
            </div>
            <div style="text-align: center;">
                <div style="font-size: 3rem; margin-bottom: 10px;">🔒</div>
                <div style="color: var(--text-primary); font-weight: bold;">Segurança</div>
            </div>
        </div>
    </div>

    {{-- CALL TO ACTION --}}
    <div style="text-align: center; padding: 60px 40px; background: linear-gradient(135deg, rgba(229,9,20,0.1) 0%, rgba(178,7,16,0.1) 100%); border-radius: 12px; border: 2px solid var(--accent-color);">
        <h2 style="font-size: 2.5rem; color: var(--accent-color); margin-bottom: 20px; font-weight: bold;">
            Pronto para Começar?
        </h2>
        <p style="font-size: 1.2rem; color: var(--text-secondary); margin-bottom: 30px; max-width: 600px; margin-left: auto; margin-right: auto;">
            Junte-se à comunidade MovieC e comece a explorar o incrível mundo do cinema hoje mesmo!
        </p>
        <div style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
            @auth
                <a href="{{ route('home') }}" style="background: var(--accent-color); color: #fff; padding: 15px 40px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 1.1rem; transition: all 0.3s;" onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 5px 20px rgba(229,9,20,0.4)';" onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='none';">
                    🎬 Explorar Filmes
                </a>
                <a href="{{ route('dashboard') }}" style="background: var(--bg-tertiary); color: var(--text-primary); padding: 15px 40px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 1.1rem; border: 2px solid var(--accent-color); transition: all 0.3s;" onmouseover="this.style.background='var(--accent-color)'; this.style.color='#fff';" onmouseout="this.style.background='var(--bg-tertiary)'; this.style.color='var(--text-primary)';">
                    📊 Meu Dashboard
                </a>
            @else
                <a href="{{ route('register') }}" style="background: var(--accent-color); color: #fff; padding: 15px 40px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 1.1rem; transition: all 0.3s;" onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 5px 20px rgba(229,9,20,0.4)';" onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='none';">
                    🚀 Criar Conta Grátis
                </a>
                <a href="{{ route('login') }}" style="background: var(--bg-tertiary); color: var(--text-primary); padding: 15px 40px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 1.1rem; border: 2px solid var(--accent-color); transition: all 0.3s;" onmouseover="this.style.background='var(--accent-color)'; this.style.color='#fff';" onmouseout="this.style.background='var(--bg-tertiary)'; this.style.color='var(--text-primary)';">
                    🔐 Fazer Login
                </a>
            @endauth
        </div>
    </div>

</div>

@endsection