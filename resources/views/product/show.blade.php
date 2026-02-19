@extends('layouts.app')

@section('title', 'Detalle del Producto')

@section('content')
@php
    // Demo para ver algo en pantalla si aún no pasas $producto desde el controlador
    $producto = $producto ?? [
        'id_producto' => 1,
        'nombre' => 'Control inalámbrico',
        'precio' => 189900,
        'descripcion' => 'Control ergonómico para PC/Consola con vibración.',
        'imagen' => 'https://picsum.photos/seed/control/700/450',
        'estado' => 'Activo',
    ];
@endphp

<div class="card">
    <div class="card__head">
        <div>
            <h2 class="card__title">Detalle del producto</h2>
            <p class="card__sub">Información completa del producto seleccionado.</p>
        </div>

        <div class="actions">
            <a class="btn" href="{{ url('/product') }}">← Volver</a>
            <a class="btn btn--ghost" href="#">Editar</a>
        </div>
    </div>

    <div style="padding:18px; display:grid; gap:16px; grid-template-columns: 420px 1fr;">
        <div class="card" style="border-radius:14px;">
            <div style="aspect-ratio: 4/3; overflow:hidden;">
                <img src="{{ $producto['imagen'] }}" alt="Imagen producto" style="width:100%; height:100%; object-fit:cover; display:block;">
            </div>
        </div>

        <div style="display:grid; gap:12px;">
            <div>
                <div class="badge {{ strtolower($producto['estado']) === 'activo' ? 'badge--ok' : 'badge--off' }}">
                    {{ $producto['estado'] }}
                </div>
            </div>

            <h3 style="margin:0; font-size:22px;">{{ $producto['nombre'] }}</h3>

            <p style="margin:0; color: var(--muted);">
                <strong>ID:</strong> {{ $producto['id_producto'] }}
            </p>

            <p style="margin:0; font-size:18px;">
                <strong>Precio:</strong> ${{ number_format($producto['precio'], 0, ',', '.') }}
            </p>

            <div class="card" style="padding:14px; border-radius:14px;">
                <p style="margin:0; color: var(--muted); font-size:12px; letter-spacing:.3px;">DESCRIPCIÓN</p>
                <p style="margin-top:8px; margin-bottom:0;">{{ $producto['descripcion'] }}</p>
            </div>

            <div class="actions">
                <button class="btn btn--danger" type="button">Eliminar</button>
            </div>
        </div>
    </div>
</div>
@endsection
