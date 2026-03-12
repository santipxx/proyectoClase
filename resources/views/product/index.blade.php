@extends('layouts.app')

@section('title', 'Catálogo de Productos')

@section('content')

<div class="container">
  <div class="product-grid-enhanced">

    @foreach ($misProductos as $product)
      <!-- CARD -->
      <div class="product-card-enhanced">

        <div class="product-image">
          @if($product->image)
            <img src="{{asset('storage/'.$product->image)  }}" alt="{{ $product->name }}">
          @else
           <img src="https://saberdetodo.com/wp-content/uploads/imagenes-1068x801.jpg" alt="">
          @endif
          
        </div>

        <div class="product-info">
          <h3 class="product-name">{{ $product->name }}</h3>
          <div class="product-price">${{ number_format($product->price, 0, ',', '.') }}</div>

          <p class="product-desc">
            {{ $product->description }}
          </p>

          <div class="card-actions">
            <a class="btn btn-secondary" href="{{ url('/product/'.$product->id_producto.'/edit') }}">Editar</a>
            <a class="btn btn-primary" href="{{ url('/product/'.$product->id_producto) }}">Detalles</a>
            <form action="{{route('product.destroy', $product)}}" method="POST">
              @method('delete') 
              @csrf 
              <button class ="btn btn-primary">Eliminar</button>
            </form>
            
          </div>
        </div>

      </div>
    @endforeach

  </div>
</div>

@endsection