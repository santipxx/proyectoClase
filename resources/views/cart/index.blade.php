@extends('layouts.app')

@section('title', 'Tu Carrito | Trendify')

@section('content')

<div class="cart-container" style="max-width: 1000px; margin: 0 auto; padding: 2rem;">
    <h1 style="font-size: 2.5rem; font-weight: 800; font-family: 'Outfit'; margin-bottom: 2rem;">Tu Carrito de Compras</h1>

    @if(session('success'))
        <div style="background: #ecfdf5; color: #10b981; padding: 1rem; border-radius: 12px; margin-bottom: 2rem; border: 1px solid #d1fae5;">
            {{ session('success') }}
        </div>
    @endif

    @if(count($cart) > 0)
        <div class="cart-grid" style="display: grid; grid-template-columns: 1fr 320px; gap: 2.5rem;">
            <!-- Lista de items -->
            <div class="cart-items">
                @foreach($cart as $id => $details)
                    <div class="cart-item" style="display: flex; gap: 1.5rem; background: white; padding: 1.5rem; border-radius: 20px; border: 1px solid #f1f5f9; box-shadow: 0 4px 15px rgba(0,0,0,0.03); margin-bottom: 1.5rem; align-items: center;">
                        <div class="item-img" style="width: 100px; height: 100px; border-radius: 12px; overflow: hidden;">
                            @if($details['image'])
                                <img src="{{ asset('storage/'.$details['image']) }}" style="width: 100%; height: 100%; object-fit: cover;">
                            @else
                                <div style="background: #f1f5f9; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; font-size: 2rem;">📦</div>
                            @endif
                        </div>
                        <div class="item-info" style="flex-grow: 1;">
                            <h3 style="font-weight: 700; font-size: 1.25rem;">{{ $details['name'] }}</h3>
                            <p style="color: #64748b; font-size: 0.9rem;">Cantidad: {{ $details['quantity'] }}</p>
                            <span style="font-weight: 800; font-size: 1.1rem; color: #1e293b;">${{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }}</span>
                        </div>
                        <form action="{{ route('cart.remove', $id) }}" method="POST">
                            @csrf
                            <button type="submit" style="background: #fee2e2; color: #ef4444; border: none; padding: 0.75rem; border-radius: 10px; cursor: pointer;">
                                🗑️
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>

            <!-- Resumen -->
            <div class="cart-summary">
                <div style="background: #1e293b; color: white; padding: 2rem; border-radius: 24px; position: sticky; top: 120px; box-shadow: 0 20px 40px rgba(0,0,0,0.1);">
                    <h2 style="font-family: 'Outfit'; font-size: 1.5rem; margin-bottom: 1.5rem;">Resumen</h2>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 1rem; color: #94a3b8;">
                        <span>Subtotal</span>
                        <span>${{ number_format($total, 0, ',', '.') }}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 2rem; color: #94a3b8;">
                        <span>Envío</span>
                        <span style="color: #10b981;">Gratis</span>
                    </div>
                    <div style="border-top: 1px dashed rgba(255,255,255,0.1); padding-top: 1.5rem; display: flex; justify-content: space-between; margin-bottom: 2.5rem;">
                        <span style="font-size: 1.25rem; font-weight: 700;">Total</span>
                        <span style="font-size: 1.5rem; font-weight: 900; color: #3b82f6;">${{ number_format($total, 0, ',', '.') }}</span>
                    </div>
                    <a href="{{ route('cart.checkout') }}" style="display: block; text-align: center; background: #3b82f6; color: white; padding: 1.25rem; border-radius: 16px; font-weight: 800; text-decoration: none; transition: 0.3s;" onmouseover="this.style.background='#2563eb'" onmouseout="this.style.background='#3b82f6'">
                        Tramitar Pedido
                    </a>
                </div>
            </div>
        </div>
    @else
        <div style="text-align: center; padding: 5rem 0;">
            <div style="font-size: 5rem; margin-bottom: 1rem;">🛍️</div>
            <h2 style="color: #94a3b8; margin-bottom: 2rem;">Tu carrito está vacío ahora mismo.</h2>
            <a href="{{ route('product.index') }}" class="btn btn-primary" style="padding: 1rem 2rem;">Explorar Tienda</a>
        </div>
    @endif
</div>

@endsection
