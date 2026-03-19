<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Tienda Premium | Descubre lo mejor</title>
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="La mejor tienda de productos premium con el catálogo más exclusivo.">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --accent: #3b82f6;
            --accent-glow: rgba(59, 130, 246, 0.4);
            --bg-dark: #0f172a;
            --card-bg: rgba(30, 41, 59, 0.7);
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
            color: #1e293b;
        }

        h1, h2, h3, h4, .font-outfit {
            font-family: 'Outfit', sans-serif;
        }

        .dark {
            background-color: var(--bg-dark);
            color: #f1f5f9;
        }

        .glass {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .dark .glass {
            background: rgba(30, 41, 59, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .hero-gradient {
            background: radial-gradient(circle at 70% 30%, var(--accent-glow) 0%, transparent 50%),
                        radial-gradient(circle at 10% 80%, rgba(139, 92, 246, 0.3) 0%, transparent 40%);
        }

        .premium-shadow {
            box-shadow: 0 20px 50px -12px rgba(0, 0, 0, 0.1);
        }

        .hover-lift {
            transition: transform 0.3s cubic-bezier(0.2, 0.6, 0.4, 1.2), box-shadow 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.15);
        }

        .reveal-anim {
            animation: reveal 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
            transform: translateY(20px);
        }

        @keyframes reveal {
            to { opacity: 1; transform: translateY(0); }
        }

        .stagger-1 { animation-delay: 0.1s; }
        .stagger-2 { animation-delay: 0.2s; }
        .stagger-3 { animation-delay: 0.3s; }

        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 10px; }
        ::-webkit-scrollbar-track { background: #f1f5f9; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 5px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }

        .dark ::-webkit-scrollbar-track { background: #1e293b; }
        .dark ::-webkit-scrollbar-thumb { background: #334155; }
    </style>
</head>
<body class="dark overflow-x-hidden">
    
    <!-- Navbar -->
    <nav class="fixed top-0 left-0 right-0 z-50 glass px-6 py-4 mx-4 my-4 rounded-3xl premium-shadow flex items-center justify-between transition-all duration-300">
        <div class="flex items-center gap-2">
            <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-blue-500/20">
                <span class="text-xl font-bold">🛒</span>
            </div>
            <span class="text-xl font-extrabold tracking-tight font-outfit uppercase text-slate-800 dark:text-white">Trendify</span>
        </div>

        <div class="hidden md:flex items-center gap-8 text-sm font-medium">
            <a href="{{ url('/product') }}" class="text-slate-600 dark:text-slate-300 hover:text-blue-500 transition-colors">Catálogo</a>
            <a href="#" class="text-slate-600 dark:text-slate-300 hover:text-blue-500 transition-colors">Categorías</a>
            <a href="#offers" class="text-slate-600 dark:text-slate-300 hover:text-blue-500 transition-colors">Ofertas</a>
            <a href="#" class="text-slate-600 dark:text-slate-300 hover:text-blue-500 transition-colors">Nosotros</a>
        </div>

        <div class="flex items-center gap-3">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/product') }}" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-2xl font-semibold text-sm transition-all shadow-lg shadow-blue-500/10 active:scale-95">
                        Mis Productos
                    </a>
                @else
                    <a href="{{ route('login') }}" class="hidden sm:block px-5 py-2.5 text-slate-600 dark:text-slate-300 font-semibold text-sm hover:underline">
                        Ingresar
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-6 py-2.5 bg-white dark:bg-slate-800 text-slate-800 dark:text-white border border-slate-200 dark:border-slate-700 hover:border-blue-500 rounded-2xl font-semibold text-sm transition-all active:scale-95">
                            Registrarse
                        </a>
                    @endif
                @endauth
            @else
                <a href="{{ url('/product') }}" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-2xl font-semibold text-sm transition-all shadow-lg shadow-blue-500/10 active:scale-95">
                    Ir a Productos
                </a>
            @endif
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative min-h-screen pt-40 pb-20 px-6 flex flex-col items-center justify-center hero-gradient overflow-hidden">
        <!-- Floating abstract shapes -->
        <div class="absolute -top-20 -left-20 w-96 h-96 bg-blue-500 opacity-10 blur-[100px] rounded-full"></div>
        <div class="absolute bottom-20 right-0 w-[500px] h-[500px] bg-purple-500 opacity-10 blur-[120px] rounded-full"></div>

        <div class="max-w-7xl w-full mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-center relative z-10">
            <div class="reveal-anim">
                <span class="inline-block px-4 py-1.5 bg-blue-500/10 dark:bg-blue-500/20 text-blue-600 dark:text-blue-400 rounded-full text-xs font-bold tracking-widest uppercase mb-6 border border-blue-500/20">
                    Nueva Colección 2026
                </span>
                <h1 class="text-5xl lg:text-8xl font-black leading-tight mb-6 bg-clip-text text-transparent bg-gradient-to-r from-slate-900 to-slate-700 dark:from-white dark:to-slate-400">
                    Eleva tu estilo, <br> <span class="text-blue-600 dark:text-blue-400">vive el mañana.</span>
                </h1>
                <p class="text-lg lg:text-xl text-slate-600 dark:text-slate-400 mb-10 max-w-lg leading-relaxed">
                    Descubre una selección cuidadosamente curada de productos técnicos y de estilo de vida que definen la vanguardia.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="#featured" class="px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white rounded-3xl font-bold text-lg transition-all shadow-xl shadow-blue-600/20 flex items-center gap-2 group">
                        Ver Catálogo
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                    <a href="/product/create" class="px-8 py-4 bg-white dark:bg-slate-800 text-slate-800 dark:text-white border border-slate-200 dark:border-slate-700 rounded-3xl font-bold text-lg hover:border-blue-500 transition-all">
                        Vender ahora
                    </a>
                </div>
                
                <!-- Trust Stats -->
                <div class="mt-16 flex items-center gap-10">
                    <div>
                        <p class="text-3xl font-bold text-slate-800 dark:text-white">+15k</p>
                        <p class="text-xs text-slate-500 font-medium uppercase tracking-wider">Usuarios</p>
                    </div>
                    <div class="w-px h-10 bg-slate-200 dark:bg-slate-700"></div>
                    <div>
                        <p class="text-3xl font-bold text-slate-800 dark:text-white">4.9</p>
                        <p class="text-xs text-slate-500 font-medium uppercase tracking-wider">Calificación</p>
                    </div>
                </div>
            </div>

            <div class="relative reveal-anim stagger-2 hidden lg:block">
                <div class="relative z-10 w-full h-[600px] rounded-[3rem] overflow-hidden premium-shadow group">
                    <img src="{{ asset('images/hero.png') }}" alt="Hero Product" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute bottom-10 left-10 text-white">
                        <p class="text-sm font-bold opacity-80 uppercase tracking-widest mb-2">Producto Destacado</p>
                        <h2 class="text-4xl font-bold mb-4">Ultra Pulse Sneakers</h2>
                        <a href="#" class="text-lg font-semibold underline underline-offset-8 decoration-2 decoration-blue-500 hover:text-blue-400 transition-colors">Explorar detalle</a>
                    </div>
                </div>
                
                <!-- Floating Decorative Cards -->
                <div class="absolute -top-10 -right-10 glass p-6 rounded-3xl premium-shadow animate-bounce delay-700" style="animation-duration: 4s;">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-emerald-500/20 text-emerald-500 rounded-full flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-tighter">Envío Gratis</p>
                            <p class="text-sm font-bold text-slate-800 dark:text-white">En todo el país</p>
                        </div>
                    </div>
                </div>

                <div class="absolute bottom-10 -right-20 glass p-6 rounded-3xl premium-shadow animate-pulse" style="animation-duration: 3s;">
                    <div class="flex items-center gap-4">
                        <div class="flex -space-x-3">
                            <div class="w-8 h-8 rounded-full border-2 border-white bg-slate-200 overflow-hidden"><img src="https://i.pravatar.cc/100?u=1" alt=""></div>
                            <div class="w-8 h-8 rounded-full border-2 border-white bg-slate-300 overflow-hidden"><img src="https://i.pravatar.cc/100?u=2" alt=""></div>
                            <div class="w-8 h-8 rounded-full border-2 border-white bg-slate-400 overflow-hidden"><img src="https://i.pravatar.cc/100?u=3" alt=""></div>
                        </div>
                        <p class="text-xs font-bold text-slate-800 dark:text-white underline">+1.2k opiniones</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    <section id="featured" class="py-32 px-6 bg-white dark:bg-slate-900 transition-colors">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
                <div class="reveal-anim">
                    <h2 class="text-4xl lg:text-5xl font-black mb-4 tracking-tight">Recientemente llegados</h2>
                    <p class="text-slate-500 text-lg max-w-xl">
                        Echa un vistazo a lo último en nuestro inventario. Calidad garantizada en cada detalle.
                    </p>
                </div>
                <a href="/product" class="text-blue-600 dark:text-blue-400 font-bold flex items-center gap-2 hover:gap-3 transition-all">
                    Ver todo el catálogo
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
                @forelse($productos as $product)
                    <div class="group hover-lift relative reveal-anim">
                        <a href="{{ route('product.show', $product) }}" class="relative block aspect-square rounded-[2rem] overflow-hidden bg-slate-100 dark:bg-slate-800 mb-6">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-5xl">📦</div>
                            @endif
                            
                            <!-- Badges -->
                            <div class="absolute top-4 left-4 flex flex-col gap-2">
                                <span class="px-3 py-1 bg-white/90 dark:bg-slate-900/90 backdrop-blur-md rounded-lg text-[10px] font-black uppercase tracking-widest text-slate-800 dark:text-white">Nuevo</span>
                                @if($product->category)
                                    <span class="px-3 py-1 bg-blue-600 rounded-lg text-[10px] font-black uppercase tracking-widest text-white">{{ $product->category->name }}</span>
                                @endif
                            </div>

                            <!-- Cart Overlay -->
                            <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                <span class="w-14 h-14 bg-white text-slate-900 rounded-full flex items-center justify-center shadow-2xl scale-75 group-hover:scale-100 transition-transform duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                    </svg>
                                </span>
                            </div>
                        </a>

                        <div>
                            <a href="{{ route('product.show', $product) }}">
                                <h3 class="text-xl font-bold mb-2 group-hover:text-blue-500 transition-colors">{{ $product->name }}</h3>
                            </a>
                            <p class="text-slate-500 text-sm mb-4 line-clamp-2">{{ Str::limit($product->description, 80) }}</p>
                            <div class="flex items-center justify-between">
                                <span class="text-2xl font-black text-slate-900 dark:text-white">${{ number_format($product->price, 0) }}</span>
                                <div class="text-amber-500 flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-current" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <span class="text-sm font-bold">4.8</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <!-- Placeholder cards if empty -->
                    @for($i = 1; $i <= 3; $i++)
                        <div class="group hover-lift relative reveal-anim">
                            <div class="aspect-square rounded-[2rem] overflow-hidden bg-slate-100 dark:bg-slate-800 mb-6 flex items-center justify-center">
                                <span class="text-4xl opacity-20">🛒</span>
                            </div>
                            <div class="h-4 bg-slate-200 dark:bg-slate-800 rounded-full w-2/3 mb-4"></div>
                            <div class="h-3 bg-slate-100 dark:bg-slate-800 rounded-full w-full mb-2"></div>
                            <div class="h-3 bg-slate-100 dark:bg-slate-800 rounded-full w-1/2 mb-6"></div>
                            <div class="h-6 bg-slate-200 dark:bg-slate-800 rounded-full w-1/3"></div>
                        </div>
                    @endfor
                @endforelse
            </div>
        </div>
    </section>

    <!-- Marketing Section / Offers -->
    <section id="offers" class="py-24 px-6 relative overflow-hidden bg-blue-600 text-white">
        <div class="absolute top-0 right-0 w-1/2 h-full bg-blue-700 -skew-x-12 translate-x-1/2 z-0"></div>
        <div class="max-w-7xl mx-auto relative z-10 grid grid-cols-1 lg:grid-cols-2 items-center gap-16">
            <div>
                <h2 class="text-4xl lg:text-6xl font-black mb-8 leading-tight">Únete a la elite de <br>compradores digitales.</h2>
                <ul class="space-y-6 mb-12">
                    <li class="flex items-center gap-4">
                        <div class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center backdrop-blur-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <span class="text-lg font-medium">Acceso anticipado a lanzamientos exclusivos</span>
                    </li>
                    <li class="flex items-center gap-4">
                        <div class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center backdrop-blur-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <span class="text-lg font-medium">Soporte premium personalizado 24/7</span>
                    </li>
                    <li class="flex items-center gap-4">
                        <div class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center backdrop-blur-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <span class="text-lg font-medium">Descuentos de hasta el 40% para miembros</span>
                    </li>
                </ul>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="inline-block px-10 py-5 bg-white text-blue-600 rounded-3xl font-black text-xl hover:bg-slate-100 transition-all shadow-2xl active:scale-95">
                        Empezar gratis
                    </a>
                @else
                    <a href="{{ url('/product') }}" class="inline-block px-10 py-5 bg-white text-blue-600 rounded-3xl font-black text-xl hover:bg-slate-100 transition-all shadow-2xl active:scale-95">
                        Explorar Ahora
                    </a>
                @endif
            </div>
            <div class="relative hidden lg:block">
                <img src="https://images.unsplash.com/photo-1557804483-ef3ae72eba50?q=80&w=2000&auto=format&fit=crop" alt="Marketing Image" class="rounded-[3rem] premium-shadow border-8 border-white/10">
                <div class="absolute inset-0 bg-blue-600/10 rounded-[3rem]"></div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="pt-24 pb-12 px-6 bg-slate-950 text-slate-400">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-20">
                <div class="col-span-1 lg:col-span-1">
                    <div class="flex items-center gap-2 mb-8">
                        <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center text-white">
                            <span class="text-sm font-bold">🛒</span>
                        </div>
                        <span class="text-xl font-black font-outfit text-white">Trendify</span>
                    </div>
                    <p class="mb-8 leading-relaxed">
                        Redefiniendo el comercio electrónico con experiencias premium y productos de alta gama.
                    </p>
                    <div class="flex gap-4">
                        <a href="#" class="w-10 h-10 rounded-full bg-slate-900 flex items-center justify-center hover:bg-blue-600 hover:text-white transition-all">FB</a>
                        <a href="#" class="w-10 h-10 rounded-full bg-slate-900 flex items-center justify-center hover:bg-blue-600 hover:text-white transition-all">IG</a>
                        <a href="#" class="w-10 h-10 rounded-full bg-slate-900 flex items-center justify-center hover:bg-blue-600 hover:text-white transition-all">TW</a>
                    </div>
                </div>

                <div>
                    <h4 class="text-white font-bold mb-8 uppercase tracking-widest text-xs">Compañía</h4>
                    <ul class="space-y-4">
                        <li><a href="#" class="hover:text-blue-500 transition-colors">Sobre nosotros</a></li>
                        <li><a href="#" class="hover:text-blue-500 transition-colors">Carreras</a></li>
                        <li><a href="#" class="hover:text-blue-500 transition-colors">Prensa</a></li>
                        <li><a href="#" class="hover:text-blue-500 transition-colors">Blog</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-bold mb-8 uppercase tracking-widest text-xs">Soporte</h4>
                    <ul class="space-y-4">
                        <li><a href="#" class="hover:text-blue-500 transition-colors">Centro de ayuda</a></li>
                        <li><a href="#" class="hover:text-blue-500 transition-colors">Contacto</a></li>
                        <li><a href="#" class="hover:text-blue-500 transition-colors">Envíos</a></li>
                        <li><a href="#" class="hover:text-blue-500 transition-colors">Devoluciones</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-bold mb-8 uppercase tracking-widest text-xs">Newsletter</h4>
                    <p class="mb-6 text-sm">Suscríbete para recibir ofertas y noticias exclusivas.</p>
                    <form class="flex flex-col gap-4">
                        <input type="email" placeholder="tu@email.com" class="px-5 py-4 bg-slate-900 rounded-2xl border border-slate-800 focus:outline-none focus:border-blue-500 text-sm">
                        <button class="px-5 py-4 bg-white text-slate-950 rounded-2xl font-bold hover:bg-blue-600 hover:text-white transition-all">Suscribirse</button>
                    </form>
                </div>
            </div>
            
            <div class="pt-8 border-t border-slate-900 flex flex-col md:flex-row justify-between items-center gap-6 text-xs font-medium">
                <p>© {{ date('Y') }} Trendify Inc. Todos los derechos reservados.</p>
                <div class="flex gap-8">
                    <a href="#" class="hover:text-white transition-colors">Términos</a>
                    <a href="#" class="hover:text-white transition-colors">Privacidad</a>
                    <a href="#" class="hover:text-white transition-colors">Cookies</a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
