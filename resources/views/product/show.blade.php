@extends('layouts.app')

@section('title', 'Especificaciones de ' . $product->name)

@section('content')

<div class="card">
    <div class="card__head">
        <div>
            <h2 class="card__title">Especificaciones del producto</h2>
            <p class="card__sub">Detalle completo y ficha técnica de {{ $product->name }}.</p>
        </div>

        <div class="actions">
            <a class="btn" href="{{ route('product.index') }}">← Volver al catálogo</a>
            <a class="btn btn--ghost" href="#">Editar</a>
        </div>
    </div>

    <div class="productDetail">
        <div class="productDetail__media">
            <div class="detailImg">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="Imagen de {{ $product->name }}">
                @else
                    <div style="aspect-ratio: 4/3; background: #eee; display: flex; align-items: center; justify-content: center; font-size: 5rem;">📦</div>
                @endif
            </div>
        </div>

        <div class="productDetail__info">
            <div class="detailBadges">
                <span class="badge badge--ok">Activo</span>
                <span class="badge">ID: {{ $product->id }}</span>
                @if($product->category)
                    <span class="badge" style="background: var(--accent); color: white;">{{ $product->category->name }}</span>
                @endif
            </div>

            <h3 class="detailTitle">{{ $product->name }}</h3>

            <p class="detailPrice">
                ${{ number_format($product->price, 0, ',', '.') }}
            </p>

            <div class="detailBlock">
                <p class="detailLabel">DESCRIPCIÓN</p>
                <p class="detailText">{{ $product->description }}</p>
            </div>

            <div class="detailBlock">
                <p class="detailLabel">INFORMACIÓN ADICIONAL</p>
                <div class="specGrid">
                    <div class="specItem">
                        <span class="specKey">Categoría</span>
                        <span class="specVal">{{ $product->category->name ?? 'Sin categoría' }}</span>
                    </div>
                    <div class="specItem">
                        <span class="specKey">Fecha de Registro</span>
                        <span class="specVal">{{ $product->created_at->format('d/m/Y') }}</span>
                    </div>
                </div>
            </div>

            <div class="actions" style="margin-bottom: 2rem;">
                <form action="{{ route('cart.add', $product) }}" method="POST">
                    @csrf
                    <button class="btn btn--primary" type="submit" style="width: 100%; justify-content: center; background: #3b82f6; color: white;">Añadir al Carrito 🛒</button>
                </form>
            </div>

            <div class="actions">
                <form action="{{ route('product.destroy', $product) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este producto?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn--danger" type="submit">Eliminar Producto</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
