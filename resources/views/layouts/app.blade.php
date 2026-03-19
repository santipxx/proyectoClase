<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Productos')</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('meta_description', 'Catálogo y administración de productos')">

    <link rel="stylesheet" href="{{ asset('css/products.css') }}">
</head>
<body>

    <a href="#contenido" class="skip-link">Saltar al contenido</a>

    <header class="topbar">
        <div class="container topbar__content">
            <div class="brand">
                <span class="brand__logo">🛒</span>
                <div class="brand__text">
                    <h1 class="brand__title">Mi Tienda</h1>
                    <p class="brand__subtitle">Módulo de Productos</p>
                </div>
            </div>

            <nav class="nav">
                <a class="nav__link" href="{{ url('/') }}">Inicio</a>
                <a class="nav__link" href="{{ url('/product') }}">Productos</a>
                <a class="nav__link" href="{{ route('cart.view') }}" style="position: relative;">
                    Carrito 🛒
                    @if(session('cart') && count(session('cart')) > 0)
                        <span style="position: absolute; top: -8px; right: -8px; background: #3b82f6; color: white; border-radius: 50%; width: 20px; height: 20px; display: flex; align-items: center; justify-content: center; font-size: 0.75rem; font-weight: 800; border: 2px solid white;">
                            {{ count(session('cart')) }}
                        </span>
                    @endif
                </a>
                <a class="nav__btn" href="{{ url('/product/create') }}">+ Crear</a>
            </nav>
        </div>
    </header>

    <main id="contenido" class="container page">
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container footer__content">
            <span>© {{ date('Y') }} Mi Tienda</span>
            <span class="footer__dot">•</span>
            <span>Hecho con Laravel</span>
        </div>
    </footer>

</body>
</html>
