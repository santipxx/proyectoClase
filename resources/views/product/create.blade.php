@extends('layouts.app')

@section('title', 'Crear Producto')

@section('content')
<div class="card">
    <div class="card__head">
        <div>
            <h2 class="card__title">Crear producto</h2>
            <p class="card__sub">Completa los datos y guarda.</p>
        </div>

        <div class="actions">
            <a class="btn" href="{{ url('/product') }}">← Volver al listado</a>
        </div>
    </div>

    <form class="form" action="#" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="grid">
            <div>
                <label for="id_producto">ID Producto</label>
                <input class="input" type="number" id="id_producto" name="id_producto" placeholder="Ej: 10">
                <div class="helper">Si luego usas BD, normalmente este campo lo genera la base de datos.</div>
            </div>

            <div>
                <label for="nombre">Nombre</label>
                <input class="input" type="text" id="nombre" name="nombre" placeholder="Ej: Teclado mecánico">
            </div>
        </div>

        <div class="grid">
            <div>
                <label for="precio">Precio</label>
                <input class="input" type="number" id="precio" name="precio" placeholder="Ej: 199900">
            </div>

            <div>
                <label for="estado">Estado</label>
                <select id="estado" name="estado">
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                </select>
            </div>
        </div>

        <div>
            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion" placeholder="Describe el producto..."></textarea>
        </div>

        <div>
            <label for="imagen">Imagen</label>
            <input class="input" type="file" id="imagen" name="imagen" accept="image/*">
            <div class="helper">Formatos recomendados: JPG/PNG/WebP.</div>
        </div>

        <div class="actions">
            <button class="btn btn--primary" type="submit">Guardar producto</button>
            <a class="btn btn--ghost" href="{{ url('/product') }}">Cancelar</a>
        </div>
    </form>
</div>
@endsection
