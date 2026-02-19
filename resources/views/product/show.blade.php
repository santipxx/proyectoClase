@extends('layouts.app')

@section('title', 'Especificaciones del Producto')

@section('content')

@php
    // Demo (si aún no pasas $producto desde el controlador)
    $producto = [
    'id_producto' => 4,
    'nombre' => 'Mouse gamer RGB',
    'precio' => 79900,
    'descripcion' => 'Mouse ergonómico con sensor de alta precisión, 6 botones programables y RGB personalizable.',
    'imagen' => 'https://picsum.photos/seed/mousegamer/1200/800',
    'estado' => 'Activo',
    'specs' => [
        'DPI' => '200 – 12.000 (ajustable)',
        'Botones' => '6 programables',
        'Conexión' => 'USB (cable trenzado)',
        'Peso' => '95 g (aprox.)',
        'Iluminación' => 'RGB configurable',
        'Garantía' => '6 meses',
        ],
    ];

@endphp

<div class="card">
    <div class="card__head">
        <div>
            <h2 class="card__title">Especificaciones del producto</h2>
            <p class="card__sub">Detalle completo y ficha técnica.</p>
        </div>

        <div class="actions">
            <a class="btn" href="{{ url('/product') }}">← Volver al catálogo</a>
            <a class="btn btn--ghost" href="#">Editar</a>
        </div>
    </div>

    <div class="productDetail">
        <div class="productDetail__media">
            <div class="detailImg">
                <img src="{{ $producto['imagen'] }}" alt="Imagen de {{ $producto['nombre'] }}">
            </div>
        </div>

        <div class="productDetail__info">
            <div class="detailBadges">
                @if(strtolower($producto['estado']) === 'activo')
                    <span class="badge badge--ok">Activo</span>
                @else
                    <span class="badge badge--off">Inactivo</span>
                @endif
                <span class="badge">ID: {{ $producto['id_producto'] }}</span>
            </div>

            <h3 class="detailTitle">{{ $producto['nombre'] }}</h3>

            <p class="detailPrice">
                ${{ number_format($producto['precio'], 0, ',', '.') }}
            </p>

            <div class="detailBlock">
                <p class="detailLabel">DESCRIPCIÓN</p>
                <p class="detailText">{{ $producto['descripcion'] }}</p>
            </div>

            <div class="detailBlock">
                <p class="detailLabel">FICHA TÉCNICA</p>

                <div class="specGrid">
                    @foreach(($producto['specs'] ?? []) as $k => $v)
                        <div class="specItem">
                            <span class="specKey">{{ $k }}</span>
                            <span class="specVal">{{ $v }}</span>
                        </div>
                    @endforeach
                </div>

                @if(empty($producto['specs'] ?? []))
                    <p class="detailText" style="color: var(--muted);">Aún no hay especificaciones cargadas.</p>
                @endif
            </div>

            <div class="actions">
                <button class="btn btn--danger" type="button">Eliminar</button>
            </div>
        </div>
    </div>
</div>

@endsection
