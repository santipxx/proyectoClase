@extends('layouts.app')

@section('title', 'Catálogo de Productos | Trendify')

@section('content')

<div class="shop-header" style="margin-bottom: 3rem; text-align: center;">
    <h2 style="font-size: 2.5rem; font-weight: 800; color: #1e293b; margin-bottom: 0.5rem; font-family: 'Outfit', sans-serif;">Nuestra Colección</h2>
    <p style="color: #64748b; font-size: 1.1rem;">Explora los productos más exclusivos seleccionados para ti.</p>
</div>

<div class="product-catalog">
    <div class="grid-container">
        @forelse ($misProductos as $product)
            <div class="dynamic-card">
                <!-- Enlace que cubre toda la caja para el efecto de clic -->
                <a href="{{ route('product.show', $product) }}" class="card-link-overlay"></a>
                
                <div class="card-image-box">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                    @else
                        <div class="placeholder-img">📦</div>
                    @endif
                    
                    <div class="card-badge">Nuevo</div>
                </div>

                <div class="card-body-content">
                    <div class="card-meta">
                        <span class="card-category">{{ $product->category->name ?? 'General' }}</span>
                        <div class="card-rating">
                            <span>★ 4.8</span>
                        </div>
                    </div>

                    <h3 class="card-product-title">{{ $product->name }}</h3>
                    <p class="card-product-desc">{{ Str::limit($product->description, 60) }}</p>

                    <div class="card-footer-flex">
                        <span class="card-product-price">${{ number_format($product->price, 0, ',', '.') }}</span>
                        
                        <div class="card-action-btns">
                            <form action="{{ route('cart.add', $product) }}" method="POST" class="add-to-cart-form" style="position: relative; z-index: 20;">
                                @csrf
                                <button type="submit" class="buy-btn-small" title="Añadir al carrito">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="empty-state" style="grid-column: 1 / -1; text-align: center; padding: 5rem;">
                <p style="font-size: 1.5rem; color: #94a3b8;">No hay productos disponibles en este momento.</p>
                <a href="{{ url('/product/create') }}" class="btn btn-primary" style="margin-top: 1rem; display: inline-block;">¡Sé el primero en vender!</a>
            </div>
        @endforelse
    </div>
</div>

<style>
    :root {
        --p-accent: #3b82f6;
        --p-text-main: #1e293b;
        --p-text-muted: #64748b;
        --p-bg-card: #ffffff;
        --p-radius: 1.5rem;
        --p-shadow: 0 10px 30px -5px rgba(0, 0, 0, 0.05);
    }

    .grid-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 2.5rem;
        padding-bottom: 5rem;
    }

    .dynamic-card {
        background: var(--p-bg-card);
        border-radius: var(--p-radius);
        position: relative;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.15);
        box-shadow: var(--p-shadow);
        border: 1px solid #f1f5f9;
        display: flex;
        flex-direction: column;
    }

    .dynamic-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.12);
        border-color: var(--p-accent);
    }

    .card-link-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 10;
    }

    .card-image-box {
        position: relative;
        width: 100%;
        aspect-ratio: 1/1;
        background: #f8fafc;
        overflow: hidden;
    }

    .card-image-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }

    .dynamic-card:hover .card-image-box img {
        transform: scale(1.1);
    }

    .card-badge {
        position: absolute;
        top: 1rem;
        left: 1rem;
        background: #10b981;
        color: white;
        font-size: 0.75rem;
        font-weight: 800;
        padding: 0.4rem 0.8rem;
        border-radius: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        box-shadow: 0 4px 10px rgba(16, 185, 129, 0.3);
    }

    .card-body-content {
        padding: 1.5rem;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .card-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 0.75rem;
    }

    .card-category {
        font-size: 0.8rem;
        font-weight: 700;
        color: var(--p-accent);
        text-transform: uppercase;
    }

    .card-rating {
        font-size: 0.85rem;
        font-weight: 700;
        color: #f59e0b;
    }

    .card-product-title {
        font-size: 1.4rem;
        font-weight: 800;
        color: var(--p-text-main);
        margin-bottom: 0.75rem;
        font-family: 'Outfit', sans-serif;
    }

    .card-product-desc {
        font-size: 0.95rem;
        color: var(--p-text-muted);
        line-height: 1.5;
        margin-bottom: auto;
    }

    .card-footer-flex {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 1.5rem;
        padding-top: 1.25rem;
        border-top: 1px dashed #e2e8f0;
    }

    .card-product-price {
        font-size: 1.6rem;
        font-weight: 900;
        color: var(--p-text-main);
    }

    .buy-btn-small {
        background: var(--p-text-main);
        color: white;
        border: none;
        width: 3rem;
        height: 3rem;
        border-radius: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .buy-btn-small:hover {
        background: var(--p-accent);
        transform: rotate(-10deg) scale(1.1);
        box-shadow: 0 10px 20px rgba(59, 130, 246, 0.3);
    }

    .placeholder-img {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        background: #f1f5f9;
        color: #cbd5e1;
    }
</style>

@endsection