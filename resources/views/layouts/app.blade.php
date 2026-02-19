<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Productos')</title>

    {{-- Tu hoja de estilos --}}
    <link rel="stylesheet" href="{{ asset('css/products.css') }}">
</head>
<body>

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
                <a class="nav__btn" href="{{ url('/product/create') }}">+ Crear</a>
            </nav>
        </div>
    </header>

    <main class="container page">
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
