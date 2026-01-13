@extends('layouts.main')

@section('content')

<div style="max-width: 600px; margin: 100px auto; padding: 40px; background: var(--bg-secondary); border-radius: 12px; text-align: center;">
    
    <div style="font-size: 4rem; margin-bottom: 20px;">
        📧
    </div>
    
    <h1 style="font-size: 2rem; color: var(--text-primary); margin-bottom: 20px;">
        Verifica o teu Email
    </h1>
    
    <p style="color: var(--text-secondary); margin-bottom: 30px; line-height: 1.6;">
        Antes de continuar, verifica a tua caixa de email para confirmar o teu endereço.
        Se não recebeste o email, clica no botão abaixo para reenviar.
    </p>
    
    @if (session('status') == 'verification-link-sent')
        <div style="background: #4caf50; color: #fff; padding: 15px 20px; border-radius: 6px; margin-bottom: 20px;">
            ✅ Um novo link de verificação foi enviado para o teu email!
        </div>
    @endif
    
    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit" 
                style="background: var(--accent-color); color: #fff; padding: 15px 40px; border: none; border-radius: 6px; cursor: pointer; font-weight: bold; font-size: 1rem; margin-bottom: 20px;">
            📨 Reenviar Email de Verificação
        </button>
    </form>
    
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" 
                style="background: transparent; color: var(--text-secondary); border: none; cursor: pointer; text-decoration: underline;">
            Sair
        </button>
    </form>
    
</div>

@endsection
