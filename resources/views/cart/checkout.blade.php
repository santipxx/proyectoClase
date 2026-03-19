@extends('layouts.app')

@section('title', 'Finalizar Compra | Trendify')

@section('content')

<div class="checkout-container" style="max-width: 800px; margin: 0 auto; padding: 2rem;">
    <h1 style="font-size: 2.5rem; font-weight: 800; font-family: 'Outfit'; margin-bottom: 1rem;">Finalizar Compra</h1>
    <p style="color: #64748b; margin-bottom: 3rem;">Completa tus datos para procesar el pago ficticio.</p>

    <div class="checkout-card" style="background: white; padding: 3rem; border-radius: 32px; box-shadow: 0 10px 40px rgba(0,0,0,0.05); border: 1px solid #f1f5f9;">
        <form action="{{ route('cart.process') }}" method="POST">
            @csrf
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 2rem;">
                <div>
                    <label style="display: block; font-size: 0.75rem; font-weight: 800; color: #1e293b; text-transform: uppercase; margin-bottom: 0.75rem;">Nombre Completo</label>
                    <input type="text" name="name" required style="width: 100%; padding: 1rem; border-radius: 12px; border: 2px solid #f1f5f9; outline: none; transition: 0.3s;" onfocus="this.style.borderColor='#3b82f6'">
                </div>
                <div>
                    <label style="display: block; font-size: 0.75rem; font-weight: 800; color: #1e293b; text-transform: uppercase; margin-bottom: 0.75rem;">Correo Electrónico</label>
                    <input type="email" name="email" required style="width: 100%; padding: 1rem; border-radius: 12px; border: 2px solid #f1f5f9; outline: none;" onfocus="this.style.borderColor='#3b82f6'">
                </div>
            </div>

            <div style="margin-bottom: 2rem;">
                <label style="display: block; font-size: 0.75rem; font-weight: 800; color: #1e293b; text-transform: uppercase; margin-bottom: 0.75rem;">Dirección de Envío</label>
                <input type="text" name="address" required style="width: 100%; padding: 1rem; border-radius: 12px; border: 2px solid #f1f5f9; outline: none;" onfocus="this.style.borderColor='#3b82f6'">
            </div>

            <div style="background: #f8fafc; padding: 2rem; border-radius: 20px; border: 2px dashed #e2e8f0; margin-bottom: 3rem;">
                <h3 style="font-weight: 700; margin-bottom: 1rem;">Método de Pago (Simulación)</h3>
                <p style="color: #64748b; font-size: 0.9rem; margin-bottom: 2rem;">No se te cobrará nada real. Solo pulsa el botón para simular el éxito.</p>
                <div style="display: flex; gap: 1rem; align-items: center;">
                    <div style="width: 50px; height: 30px; background: #334155; border-radius: 4px;"></div>
                    <span style="font-weight: 600;">**** **** **** 1234</span>
                </div>
            </div>

            <button type="submit" style="width: 100%; background: #1e293b; color: white; padding: 1.5rem; border-radius: 20px; font-weight: 800; font-size: 1.1rem; border: none; cursor: pointer; transition: 0.3s; display: flex; align-items: center; justify-content: center; gap: 1rem;">
                💰 Realizar Pago Ficticio
            </button>
        </form>
    </div>
</div>

@endsection
