@extends('layouts.app')

@section('title', 'Catálogo de Productos')

@section('content')

@php
    // Demo (si aún no pasas $productos desde el controlador)
    $productos = $productos ?? [
        [
            'id_producto' => 1,
            'nombre' => 'Control inalámbrico',
            'precio' => 189900,
            'descripcion' => 'Control ergonómico para PC/Consola con vibración.',
            'imagen' => 'https://picsum.photos/seed/control/800/600',
            'estado' => 'Activo',
        ],
        [
            'id_producto' => 2,
            'nombre' => 'Audífonos gamer',
            'precio' => 129900,
            'descripcion' => 'Sonido envolvente y micrófono con cancelación de ruido.',
            'imagen' => 'https://picsum.photos/seed/headset/800/600',
            'estado' => 'Inactivo',
        ],
        [
            'id_producto' => 3,
            'nombre' => 'Teclado mecánico',
            'precio' => 219900,
            'descripcion' => 'Switches táctiles, iluminación RGB, hot-swap.',
            'imagen' => 'https://picsum.photos/seed/keyboard/800/600',
            'estado' => 'Activo',
        ],

        [
        'id_producto' => 4,
        'nombre' => 'Mouse gamer RGB',
        'precio' => 79900,
        'descripcion' => 'Mouse ergonómico con sensor de alta precisión y RGB personalizable.',
        'imagen' => 'https://picsum.photos/seed/mousegamer/800/600',
        'estado' => 'Activo',
        ],

    ];
@endphp

<div class="card">
    <div class="card__head">
        <div>
            <h2 class="card__title">Catálogo</h2>
            <p class="card__sub">Explora los productos disponibles.</p>
        </div>

        <div class="actions">
            <a class="btn btn--primary" href="{{ url('/product/create') }}">+ Nuevo producto</a>
        </div>
    </div>

    <div style="padding: 18px;">
        <div class="catalog">
            @foreach($productos as $p)
                <div class="productCard">
                    <div class="productCard__img">
                        <img src="{{ $p['imagen'] }}" alt="Imagen de {{ $p['nombre'] }}">
                        <div class="productCard__badge">
                            @if(strtolower($p['estado']) === 'activo')
                                <span class="badge badge--ok">Activo</span>
                            @else
                                <span class="badge badge--off">Inactivo</span>
                            @endif
                        </div>
                    </div>

                    <div class="productCard__body">
                        <div class="productCard__top">
                            <h3 class="productCard__title">{{ $p['nombre'] }}</h3>
                            <p class="productCard__price">
                                ${{ number_format($p['precio'], 0, ',', '.') }}
                            </p>
                        </div>

                        <p class="productCard__desc">{{ $p['descripcion'] }}</p>

                        <div class="productCard__meta">
                            <span class="metaPill">ID: {{ $p['id_producto'] }}</span>
                        </div>

                        <div class="productCard__actions">
                            <a class="btn btn--primary" href="{{ url('/product/'.$p['id_producto']) }}">Ver specs</a>
                            <a class="btn btn--ghost" href="#">Editar</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
