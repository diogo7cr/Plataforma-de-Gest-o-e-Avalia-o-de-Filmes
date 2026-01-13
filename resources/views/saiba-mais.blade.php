@extends('layouts.main')

@section('content')

<div style="max-width: 1200px; margin: 0 auto; padding: 60px 40px;">

    {{-- HERO SECTION --}}
    <div style="text-align: center; margin-bottom: 80px;">
        <h1 style="font-size: 3.5rem; color: var(--accent-color); margin-bottom: 20px; font-weight: bold;">
            📖 Saiba Mais sobre o MovieC
        </h1>
        <p style="font-size: 1.3rem; color: var(--text-secondary); max-width: 800px; margin: 0 auto; line-height: 1.8;">
            Descubra como aproveitar ao máximo a nossa plataforma e tornar-se parte da maior comunidade de cinema online.
        </p>
    </div>

    {{-- PARA QUEM É --}}
    <div style="background: var(--bg-secondary); padding: 50px; border-radius: 12px; margin-bottom: 40px; border-left: 5px solid var(--accent-color);">
        <h2 style="font-size: 2.2rem; color: var(--accent-color); margin-bottom: 25px; display: flex; align-items: center; gap: 15px;">
            <span style="font-size: 2.5rem;">👥</span> Para Quem é o MovieC?
        </h2>
        <p style="font-size: 1.15rem; color: var(--text-primary); line-height: 1.9; margin-bottom: 20px;">
            O MovieC foi criado para todos os amantes de cinema que desejam partilhar as suas opiniões, descobrir novos filmes e conectar-se com outros cinéfilos. Seja você um crítico experiente ou apenas alguém que gosta de assistir filmes, este é o seu espaço!
        </p>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-top: 30px;">
            <div style="padding: 20px; background: var(--bg-tertiary); border-radius: 8px;">
                <div style="font-size: 2rem; margin-bottom: 10px;">🎓</div>
                <h4 style="color: var(--accent-color); margin-bottom: 10px; font-size: 1.2rem;">Estudantes de Cinema</h4>
                <p style="color: var(--text-secondary); font-size: 0.95rem;">Analise e discuta obras cinematográficas com profundidade.</p>
            </div>
            <div style="padding: 20px; background: var(--bg-tertiary); border-radius: 8px;">
                <div style="font-size: 2rem; margin-bottom: 10px;">🍿</div>
                <h4 style="color: var(--accent-color); margin-bottom: 10px; font-size: 1.2rem;">Cinéfilos Apaixonados</h4>
                <p style="color: var(--text-secondary); font-size: 0.95rem;">Partilhe a sua paixão e descubra joias escondidas.</p>
            </div>
            <div style="padding: 20px; background: var(--bg-tertiary); border-radius: 8px;">
                <div style="font-size: 2rem; margin-bottom: 10px;">✍️</div>
                <h4 style="color: var(--accent-color); margin-bottom: 10px; font-size: 1.2rem;">Críticos Amadores</h4>
                <p style="color: var(--text-secondary); font-size: 0.95rem;">Desenvolva as suas habilidades de análise cinematográfica.</p>
            </div>
            <div style="padding: 20px; background: var(--bg-tertiary); border-radius: 8px;">
                <div style="font-size: 2rem; margin-bottom: 10px;">🎬</div>
                <h4 style="color: var(--accent-color); margin-bottom: 10px; font-size: 1.2rem;">Amantes Casuais</h4>
                <p style="color: var(--text-secondary); font-size: 0.95rem;">Encontre o próximo filme perfeito para assistir.</p>
            </div>
        </div>
    </div>

    {{-- COMO FUNCIONA --}}
    <div style="margin-bottom: 60px;">
        <h2 style="font-size: 2.5rem; color: var(--text-primary); margin-bottom: 40px; text-align: center; font-weight: bold;">
            🎯 Como Funciona?
        </h2>
        
        <div style="display: grid; gap: 30px;">
            
            {{-- Passo 1 --}}
            <div style="display: grid; grid-template-columns: 80px 1fr; gap: 30px; background: var(--bg-secondary); padding: 30px; border-radius: 12px; align-items: center;">
                <div style="width: 80px; height: 80px; background: var(--accent-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 2rem; color: #fff; font-weight: bold;">1</div>
                <div>
                    <h3 style="font-size: 1.8rem; color: var(--accent-color); margin-bottom: 15px;">📝 Crie a Sua Conta</h3>
                    <p style="font-size: 1.1rem; color: var(--text-secondary); line-height: 1.8;">
                        Registe-se gratuitamente em menos de 1 minuto. Basta fornecer o seu nome, email e criar uma senha segura. Pronto! Está dentro da comunidade MovieC.
                    </p>
                </div>
            </div>

            {{-- Passo 2 --}}
            <div style="display: grid; grid-template-columns: 80px 1fr; gap: 30px; background: var(--bg-secondary); padding: 30px; border-radius: 12px; align-items: center;">
                <div style="width: 80px; height: 80px; background: var(--accent-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 2rem; color: #fff; font-weight: bold;">2</div>
                <div>
                    <h3 style="font-size: 1.8rem; color: var(--accent-color); margin-bottom: 15px;">🔍 Explore o Catálogo</h3>
                    <p style="font-size: 1.1rem; color: var(--text-secondary); line-height: 1.8;">
                        Navegue por centenas de filmes organizados por género, ano e avaliação. Use os filtros avançados para encontrar exatamente o que procura. De clássicos atemporais a sucessos recentes.
                    </p>
                </div>
            </div>

            {{-- Passo 3 --}}
            <div style="display: grid; grid-template-columns: 80px 1fr; gap: 30px; background: var(--bg-secondary); padding: 30px; border-radius: 12px; align-items: center;">
                <div style="width: 80px; height: 80px; background: var(--accent-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 2rem; color: #fff; font-weight: bold;">3</div>
                <div>
                    <h3 style="font-size: 1.8rem; color: var(--accent-color); margin-bottom: 15px;">⭐ Avalie e Comente</h3>
                    <p style="font-size: 1.1rem; color: var(--text-secondary); line-height: 1.8;">
                        Partilhe a sua opinião! Avalie filmes de 1 a 5 estrelas e escreva comentários detalhados. As suas avaliações ajudam outros utilizadores a descobrir grandes filmes.
                    </p>
                </div>
            </div>

            {{-- Passo 4 --}}
            <div style="display: grid; grid-template-columns: 80px 1fr; gap: 30px; background: var(--bg-secondary); padding: 30px; border-radius: 12px; align-items: center;">
                <div style="width: 80px; height: 80px; background: var(--accent-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 2rem; color: #fff; font-weight: bold;">4</div>
                <div>
                    <h3 style="font-size: 1.8rem; color: var(--accent-color); margin-bottom: 15px;">❤️ Crie Listas</h3>
                    <p style="font-size: 1.1rem; color: var(--text-secondary); line-height: 1.8;">
                        Adicione filmes aos seus favoritos e crie listas personalizadas. Organize os seus filmes preferidos e aceda-os rapidamente sempre que quiser.
                    </p>
                </div>
            </div>

            {{-- Passo 5 --}}
            <div style="display: grid; grid-template-columns: 80px 1fr; gap: 30px; background: var(--bg-secondary); padding: 30px; border-radius: 12px; align-items: center;">
                <div style="width: 80px; height: 80px; background: var(--accent-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 2rem; color: #fff; font-weight: bold;">5</div>
                <div>
                    <h3 style="font-size: 1.8rem; color: var(--accent-color); margin-bottom: 15px;">🤝 Conecte-se</h3>
                    <p style="font-size: 1.1rem; color: var(--text-secondary); line-height: 1.8;">
                        Leia comentários de outros utilizadores, descubra novas perspectivas e participe de discussões sobre os seus filmes favoritos. Cinema é melhor quando partilhado!
                    </p>
                </div>
            </div>

        </div>
    </div>

    {{-- RECURSOS ESPECIAIS --}}
    <div style="background: linear-gradient(135deg, var(--accent-color) 0%, #b20710 100%); padding: 60px 40px; border-radius: 12px; margin-bottom: 60px;">
        <h2 style="font-size: 2.5rem; color: #fff; margin-bottom: 40px; text-align: center; font-weight: bold;">
            ✨ Recursos Especiais
        </h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px;">
            
            <div style="text-align: center; padding: 30px; background: rgba(255,255,255,0.1); border-radius: 12px; backdrop-filter: blur(10px);">
                <div style="font-size: 3rem; margin-bottom: 15px;">🎨</div>
                <h4 style="color: #fff; margin-bottom: 10px; font-size: 1.3rem; font-weight: bold;">Interface Intuitiva</h4>
                <p style="color: rgba(255,255,255,0.9); line-height: 1.6;">Design moderno e fácil de usar, inspirado nas melhores plataformas de streaming.</p>
            </div>

            <div style="text-align: center; padding: 30px; background: rgba(255,255,255,0.1); border-radius: 12px; backdrop-filter: blur(10px);">
                <div style="font-size: 3rem; margin-bottom: 15px;">🌓</div>
                <h4 style="color: #fff; margin-bottom: 10px; font-size: 1.3rem; font-weight: bold;">Modo Escuro/Claro</h4>
                <p style="color: rgba(255,255,255,0.9); line-height: 1.6;">Alterne entre temas claro e escuro para uma experiência visual perfeita.</p>
            </div>

            <div style="text-align: center; padding: 30px; background: rgba(255,255,255,0.1); border-radius: 12px; backdrop-filter: blur(10px);">
                <div style="font-size: 3rem; margin-bottom: 15px;">📱</div>
                <h4 style="color: #fff; margin-bottom: 10px; font-size: 1.3rem; font-weight: bold;">100% Responsivo</h4>
                <p style="color: rgba(255,255,255,0.9); line-height: 1.6;">Funciona perfeitamente em qualquer dispositivo - PC, tablet ou smartphone.</p>
            </div>

            <div style="text-align: center; padding: 30px; background: rgba(255,255,255,0.1); border-radius: 12px; backdrop-filter: blur(10px);">
                <div style="font-size: 3rem; margin-bottom: 15px;">⚡</div>
                <h4 style="color: #fff; margin-bottom: 10px; font-size: 1.3rem; font-weight: bold;">Rápido e Seguro</h4>
                <p style="color: rgba(255,255,255,0.9); line-height: 1.6;">Tecnologia moderna garante velocidade e proteção dos seus dados.</p>
            </div>

        </div>
    </div>

    {{-- DICAS --}}
    <div style="background: var(--bg-secondary); padding: 50px; border-radius: 12px; margin-bottom: 60px;">
        <h2 style="font-size: 2.5rem; color: var(--accent-color); margin-bottom: 30px; text-align: center; font-weight: bold;">
            💡 Dicas para Aproveitar ao Máximo
        </h2>
        <div style="display: grid; gap: 20px; max-width: 900px; margin: 0 auto;">
            
            <div style="display: flex; gap: 20px; padding: 25px; background: var(--bg-tertiary); border-radius: 8px; border-left: 4px solid var(--accent-color);">
                <div style="font-size: 2rem;">📝</div>
                <div>
                    <h4 style="color: var(--text-primary); margin-bottom: 10px; font-size: 1.2rem; font-weight: bold;">Seja Detalhado nos Comentários</h4>
                    <p style="color: var(--text-secondary); line-height: 1.7;">Partilhe os seus pensamentos de forma clara e construtiva. Comentários detalhados ajudam outros utilizadores.</p>
                </div>
            </div>

            <div style="display: flex; gap: 20px; padding: 25px; background: var(--bg-tertiary); border-radius: 8px; border-left: 4px solid var(--accent-color);">
                <div style="font-size: 2rem;">🔍</div>
                <div>
                    <h4 style="color: var(--text-primary); margin-bottom: 10px; font-size: 1.2rem; font-weight: bold;">Use os Filtros</h4>
                    <p style="color: var(--text-secondary); line-height: 1.7;">Aproveite a pesquisa avançada para encontrar filmes específicos por género, ano ou avaliação.</p>
                </div>
            </div>

            <div style="display: flex; gap: 20px; padding: 25px; background: var(--bg-tertiary); border-radius: 8px; border-left: 4px solid var(--accent-color);">
                <div style="font-size: 2rem;">❤️</div>
                <div>
                    <h4 style="color: var(--text-primary); margin-bottom: 10px; font-size: 1.2rem; font-weight: bold;">Organize os Favoritos</h4>
                    <p style="color: var(--text-secondary); line-height: 1.7;">Mantenha uma lista atualizada dos seus filmes favoritos para fácil acesso e referência futura.</p>
                </div>
            </div>

            <div style="display: flex; gap: 20px; padding: 25px; background: var(--bg-tertiary); border-radius: 8px; border-left: 4px solid var(--accent-color);">
                <div style="font-size: 2rem;">🤝</div>
                <div>
                    <h4 style="color: var(--text-primary); margin-bottom: 10px; font-size: 1.2rem; font-weight: bold;">Respeite Outras Opiniões</h4>
                    <p style="color: var(--text-secondary); line-height: 1.7;">Cinema é subjetivo. Respeite as opiniões dos outros utilizadores, mesmo quando não concordar.</p>
                </div>
            </div>

        </div>
    </div>

    {{-- FAQ --}}
    <div style="margin-bottom: 60px;">
        <h2 style="font-size: 2.5rem; color: var(--text-primary); margin-bottom: 40px; text-align: center; font-weight: bold;">
            ❓ Perguntas Frequentes
        </h2>
        <div style="max-width: 900px; margin: 0 auto; display: grid; gap: 20px;">
            
            <details style="background: var(--bg-secondary); padding: 25px; border-radius: 8px; cursor: pointer;">
                <summary style="font-size: 1.2rem; color: var(--accent-color); font-weight: bold; cursor: pointer;">
                    O MovieC é gratuito?
                </summary>
                <p style="margin-top: 15px; color: var(--text-secondary); line-height: 1.7;">
                    Sim! O MovieC é 100% gratuito. Pode criar conta, avaliar filmes, comentar e usar todos os recursos sem qualquer custo.
                </p>
            </details>

            <details style="background: var(--bg-secondary); padding: 25px; border-radius: 8px; cursor: pointer;">
                <summary style="font-size: 1.2rem; color: var(--accent-color); font-weight: bold; cursor: pointer;">
                    Posso assistir filmes no MovieC?
                </summary>
                <p style="margin-top: 15px; color: var(--text-secondary); line-height: 1.7;">
                    O MovieC é uma plataforma de avaliação e discussão de filmes, não de streaming. Aqui você descobre e partilha opiniões sobre filmes.
                </p>
            </details>

            <details style="background: var(--bg-secondary); padding: 25px; border-radius: 8px; cursor: pointer;">
                <summary style="font-size: 1.2rem; color: var(--accent-color); font-weight: bold; cursor: pointer;">
                    Como posso sugerir novos filmes?
                </summary>
                <p style="margin-top: 15px; color: var(--text-secondary); line-height: 1.7;">
                    Os administradores adicionam regularmente novos filmes ao catálogo. Em breve teremos um sistema de sugestões dos utilizadores.
                </p>
            </details>

            <details style="background: var(--bg-secondary); padding: 25px; border-radius: 8px; cursor: pointer;">
                <summary style="font-size: 1.2rem; color: var(--accent-color); font-weight: bold; cursor: pointer;">
                    Posso editar os meus comentários?
                </summary>
                <p style="margin-top: 15px; color: var(--text-secondary); line-height: 1.7;">
                    Atualmente os comentários não podem ser editados após publicação. Recomendamos rever antes de enviar.
                </p>
            </details>

        </div>
    </div>

    {{-- CALL TO ACTION --}}
    <div style="text-align: center; padding: 60px 40px; background: linear-gradient(135deg, rgba(229,9,20,0.1) 0%, rgba(178,7,16,0.1) 100%); border-radius: 12px; border: 2px solid var(--accent-color);">
        <h2 style="font-size: 2.5rem; color: var(--accent-color); margin-bottom: 20px; font-weight: bold;">
            Pronto para Começar?
        </h2>
        <p style="font-size: 1.2rem; color: var(--text-secondary); margin-bottom: 30px; max-width: 700px; margin-left: auto; margin-right: auto;">
            Junte-se a milhares de cinéfilos e comece a partilhar as suas opiniões sobre os melhores filmes do mundo!
        </p>
        <div style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
            @auth
                <a href="{{ route('home') }}" style="background: var(--accent-color); color: #fff; padding: 18px 45px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 1.15rem; transition: all 0.3s;" onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 5px 20px rgba(229,9,20,0.4)';" onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='none';">
                    🎬 Explorar Filmes Agora
                </a>
            @else
                <a href="{{ route('register') }}" style="background: var(--accent-color); color: #fff; padding: 18px 45px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 1.15rem; transition: all 0.3s;" onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 5px 20px rgba(229,9,20,0.4)';" onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='none';">
                    🚀 Criar Conta Grátis
                </a>
                <a href="{{ route('about') }}" style="background: var(--bg-tertiary); color: var(--text-primary); padding: 18px 45px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 1.15rem; border: 2px solid var(--accent-color); transition: all 0.3s;" onmouseover="this.style.background='var(--accent-color)'; this.style.color='#fff';" onmouseout="this.style.background='var(--bg-tertiary)'; this.style.color='var(--text-primary)';">
                    📖 Sobre Nós
                </a>
            @endauth
        </div>
    </div>

</div>

@endsection