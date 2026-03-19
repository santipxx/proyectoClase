@extends('layouts.app')

@section('title', '¡Pedido Completado! | Trendify')

@section('content')

<div class="success-container" style="max-width: 600px; margin: 0 auto; padding: 5rem 2rem; text-align: center;">
    <div style="background: #ecfdf5; width: 100px; height: 100px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 2.5rem; border: 4px solid #10b981; color: #10b981; font-size: 3rem; animation: success-appear 0.6s ease-out;">
        ✓
    </div>

    <h1 style="font-size: 3rem; font-weight: 900; font-family: 'Outfit'; margin-bottom: 1rem;">¡Pago Confirmado!</h1>
    <p style="color: #64748b; font-size: 1.25rem; margin-bottom: 3.5rem; line-height: 1.6;">
        Tu pedido ha sido procesado con éxito (ficticiamente). <br>
        Gracias por probar la experiencia Trendify.
    </p>

    <div style="display: flex; gap: 1.5rem; justify-content: center;">
        <a href="{{ route('product.index') }}" style="background: #1e293b; color: white; padding: 1.25rem 2.5rem; border-radius: 16px; font-weight: 800; text-decoration: none; transition: 0.3s; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
            Seguir comprando
        </a>
        <a href="/" style="background: white; color: #1e293b; padding: 1.25rem 2.5rem; border-radius: 16px; font-weight: 800; text-decoration: none; transition: 0.3s; border: 1px solid #e2e8f0;">
            Ir al inicio
        </a>
    </div>
</div>

<style>
    @keyframes success-appear {
        0% { transform: scale(0); opacity: 0; }
        80% { transform: scale(1.1); }
        100% { transform: scale(1); opacity: 1; }
    }
</style>

@endsection
