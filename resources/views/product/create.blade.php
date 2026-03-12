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

    <form class="form" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="grid">
            

            <div>
                <label for="nombre">Nombre</label>
                <input class="input" type="text" id="nombre" name="nombre" placeholder="Ej: Teclado mecánico">
            </div>
            @error('nombre')
            <span style="color: red; font: size 14px;">Hay un error en la validacion</span>
                

            @enderror
        </div>

        <div class="grid">
            <div>
                <label for="precio">Precio</label>
                <input class="input" type="number" id="precio" name="precio" placeholder="Ej: 199900">
            </div>
            @error('precio')
            <span style="color: red; font: size 14px;">Hay un error en la validacion</span>
                

            @enderror

            <div>
                <label for="estado">Categoria</label>
                <select id="category" name="category">
                    @foreach($categoryList as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            @error('category')
            <span style="color: red; font: size 14px;">Hay un error en la validacion</span>
                

            @enderror
        </div>

        <div>
            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion" placeholder="Describe el producto..."></textarea>
        </div>
        @error('drescripcion')
            <span style="color: red; font: size 14px;">Hay un error en la validacion</span>
                

        @enderror

        <div>
            <label for="imagen">Imagen</label>
            <input class="input" type="file" id="imagen" name="imagen" accept="image/*">
            <div class="helper">Formatos recomendados: JPG/PNG/WebP.</div>
        </div>
        @error('imagen')
            <span style="color: red; font: size 14px;">Hay un error en la validacion</span>
                

            @enderror

        <div class="actions">
            <button class="btn btn--primary" type="submit">Guardar producto</button>
            <a class="btn btn--ghost" href="{{ url('/product') }}">Cancelar</a>
        </div>
    </form>
</div>
@endsection
