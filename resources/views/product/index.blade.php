@extends('layouts.app')

@section('title', 'Listado de Productos')

@section('content')
<div class="card">
    <div class="card__head">
        <div>
            <h2 class="card__title">Productos</h2>
            <p class="card__sub">Listado general (demo). Puedes conectar esto a BD cuando quieras.</p>
        </div>

        <div class="actions">
            <a class="btn btn--primary" href="{{ url('/product/create') }}">+ Nuevo producto</a>
        </div>
    </div>

    @php
        // Datos de ejemplo (para que se vea la tabla).
        // Luego reemplazas esto por $productos desde tu controlador.
        $productos = $productos ?? [
            [
                'id_producto' => 1,
                'nombre' => 'Control inalámbrico',
                'precio' => 189900,
                'descripcion' => 'Control ergonómico para PC/Consola con vibración.',
                'imagen' => 'https://picsum.photos/seed/control/120/120',
                'estado' => 'Activo',
            ],
            [
                'id_producto' => 2,
                'nombre' => 'Audífonos gamer',
                'precio' => 129900,
                'descripcion' => 'Sonido envolvente y micrófono con cancelación de ruido.',
                'imagen' => 'https://picsum.photos/seed/headset/120/120',
                'estado' => 'Inactivo',
            ],
            [
                'id_producto' => 3,
                'nombre' => 'Teclado mecánico',
                'precio' => 219900,
                'descripcion' => 'Switches táctiles, iluminación RGB, hot-swap.',
                'imagen' => 'https://picsum.photos/seed/keyboard/120/120',
                'estado' => 'Activo',
            ],
        ];
    @endphp

    <div class="tableWrap">
        <table>
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th style="width: 180px;">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach($productos as $p)
                    <tr>
                        <td>
                            <div class="thumb">
                                <img src="{{ $p['imagen'] }}" alt="Imagen producto">
                            </div>
                        </td>

                        <td>{{ $p['id_producto'] }}</td>
                        <td><strong>{{ $p['nombre'] }}</strong></td>

                        <td>
                            ${{ number_format($p['precio'], 0, ',', '.') }}
                        </td>

                        <td style="max-width: 360px;">
                            <span class="muted">{{ $p['descripcion'] }}</span>
                        </td>

                        <td>
                            @if(strtolower($p['estado']) === 'activo')
                                <span class="badge badge--ok">Activo</span>
                            @else
                                <span class="badge badge--off">Inactivo</span>
                            @endif
                        </td>

                        <td>
                            <div class="actions">
                                {{-- si luego usas route model binding: /product/{id} --}}
                                <a class="btn" href="{{ url('/product/'.$p['id_producto']) }}">Ver</a>
                                <a class="btn btn--ghost" href="#">Editar</a>
                                <button class="btn btn--danger" type="button">Eliminar</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
@endsection
