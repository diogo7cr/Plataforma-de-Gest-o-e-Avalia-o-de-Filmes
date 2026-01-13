@extends('layouts.main')

@section('content')

<div style="max-width: 800px; margin: 40px auto; padding: 40px;">
    
    <div style="margin-bottom: 30px;">
        <a href="{{ route('admin.movies') }}" 
           style="color: #e50914; text-decoration: none; font-size: 1.1rem; font-weight: bold;">
            ← Voltar à Gestão de Filmes
        </a>
    </div>

    <h1 style="font-size: 2.5rem; color: #e50914; margin-bottom: 40px;">
        ➕ Adicionar Novo Filme
    </h1>

    {{-- FORMULÁRIO --}}
    <div style="background: #1c1c1c; padding: 40px; border-radius: 12px;">
        
        <form method="POST" action="{{ route('movies.store') }}" enctype="multipart/form-data">
            @csrf

            {{-- Título --}}
            <div style="margin-bottom: 25px;">
                <label for="title" style="display: block; margin-bottom: 8px; color: #b3b3b3; font-weight: bold; font-size: 1rem;">
                    Título *
                </label>
                <input type="text" 
                       id="title" 
                       name="title" 
                       value="{{ old('title') }}" 
                       required
                       style="width: 100%; padding: 15px; background: #2a2a2a; border: 1px solid #3a3a3a; border-radius: 6px; color: #fff; font-size: 1rem;">
                @error('title')
                    <p style="color: #e50914; margin-top: 5px; font-size: 0.9rem;">{{ $message }}</p>
                @enderror
            </div>

            {{-- Sinopse --}}
            <div style="margin-bottom: 25px;">
                <label for="overview" style="display: block; margin-bottom: 8px; color: #b3b3b3; font-weight: bold; font-size: 1rem;">
                    Sinopse
                </label>
                <textarea id="overview" 
                          name="overview" 
                          rows="5"
                          style="width: 100%; padding: 15px; background: #2a2a2a; border: 1px solid #3a3a3a; border-radius: 6px; color: #fff; font-size: 1rem; resize: vertical;">{{ old('overview') }}</textarea>
                @error('overview')
                    <p style="color: #e50914; margin-top: 5px; font-size: 0.9rem;">{{ $message }}</p>
                @enderror
            </div>

            {{-- Géneros --}}
            <div style="margin-bottom: 25px;">
                <label for="genres" style="display: block; margin-bottom: 8px; color: #b3b3b3; font-weight: bold; font-size: 1rem;">
                    Géneros
                </label>
                <input type="text" 
                       id="genres" 
                       name="genres" 
                       value="{{ old('genres') }}"
                       placeholder="Ex: Ação, Drama, Ficção Científica"
                       style="width: 100%; padding: 15px; background: #2a2a2a; border: 1px solid #3a3a3a; border-radius: 6px; color: #fff; font-size: 1rem;">
                @error('genres')
                    <p style="color: #e50914; margin-top: 5px; font-size: 0.9rem;">{{ $message }}</p>
                @enderror
            </div>

            {{-- Data de Lançamento --}}
            <div style="margin-bottom: 25px;">
                <label for="release_date" style="display: block; margin-bottom: 8px; color: #b3b3b3; font-weight: bold; font-size: 1rem;">
                    Data de Lançamento
                </label>
                <input type="date" 
                       id="release_date" 
                       name="release_date" 
                       value="{{ old('release_date') }}"
                       style="width: 100%; padding: 15px; background: #2a2a2a; border: 1px solid #3a3a3a; border-radius: 6px; color: #fff; font-size: 1rem;">
                @error('release_date')
                    <p style="color: #e50914; margin-top: 5px; font-size: 0.9rem;">{{ $message }}</p>
                @enderror
            </div>

            {{-- Poster --}}
            <div style="margin-bottom: 25px;">
                <label for="poster" style="display: block; margin-bottom: 8px; color: #b3b3b3; font-weight: bold; font-size: 1rem;">
                    Poster (opcional)
                </label>
                <input type="file" 
                       id="poster" 
                       name="poster" 
                       accept="image/*"
                       onchange="previewImage(event)"
                       style="width: 100%; padding: 15px; background: #2a2a2a; border: 2px dashed #e50914; border-radius: 6px; color: #fff; cursor: pointer; font-size: 0.95rem;">
                @error('poster')
                    <p style="color: #e50914; margin-top: 5px; font-size: 0.9rem;">{{ $message }}</p>
                @enderror
                
                {{-- Preview --}}
                <img id="preview" 
                     style="max-width: 300px; margin-top: 15px; display: none; border-radius: 8px; border: 2px solid #e50914;">
            </div>

            {{-- Botões --}}
            <div style="display: flex; gap: 15px; margin-top: 40px;">
                <button type="submit" 
                        style="background: #e50914; color: #fff; padding: 15px 40px; border: none; border-radius: 6px; cursor: pointer; font-weight: bold; font-size: 1rem;">
                    ✅ Criar Filme
                </button>
                <a href="{{ route('admin.movies') }}" 
                   style="background: #2a2a2a; color: #fff; padding: 15px 40px; border-radius: 6px; text-decoration: none; font-weight: bold; font-size: 1rem; display: inline-block;">
                    ❌ Cancelar
                </a>
            </div>
        </form>

    </div>

</div>

<script>
    function previewImage(event) {
        const preview = document.getElementById('preview');
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>

@endsection