<!DOCTYPE html>
<html lang="es" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Trendify</title>
    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --sidebar-width: 280px;
            --admin-bg: #0f172a;
            --admin-card: #1e293b;
            --admin-accent: #3b82f6;
            --admin-border: rgba(255, 255, 255, 0.05);
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--admin-bg);
            color: #f1f5f9;
            margin: 0;
            display: flex;
        }

        h1, h2, h3, h4, .font-outfit {
            font-family: 'Outfit', sans-serif;
        }

        /* Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            background: #1e293b;
            border-right: 1px solid var(--admin-border);
            position: fixed;
            left: 0;
            top: 0;
            padding: 2rem 1.5rem;
            display: flex;
            flex-direction: column;
            z-index: 50;
        }

        .sidebar-brand {
            display: flex;
            items-center: center;
            gap: 0.75rem;
            margin-bottom: 3rem;
            text-decoration: none;
        }

        .sidebar-logo {
            width: 35px;
            height: 35px;
            background: var(--admin-accent);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }

        .sidebar-nav {
            list-style: none;
            padding: 0;
            margin: 0;
            flex-grow: 1;
        }

        .nav-item {
            margin-bottom: 0.5rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.75rem 1rem;
            color: #94a3b8;
            text-decoration: none;
            border-radius: 12px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .nav-link:hover, .nav-link.active {
            background: rgba(59, 130, 246, 0.1);
            color: var(--admin-accent);
        }

        .nav-link i {
            font-size: 1.25rem;
        }

        /* Content Styles */
        .main-content {
            margin-left: var(--sidebar-width);
            flex-grow: 1;
            padding: 2.5rem;
            min-height: 100vh;
        }

        .top-bar {
            margin-bottom: 2.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 1rem;
            background: var(--admin-card);
            padding: 0.5rem 1rem;
            border-radius: 16px;
            border: 1px solid var(--admin-border);
        }

        .avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: #334155;
        }

        /* Card Styles */
        .admin-card {
            background: var(--admin-card);
            border-radius: 20px;
            padding: 1.5rem;
            border: 1px solid var(--admin-border);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .stat-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2.5rem;
        }

        .stat-card {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .stat-value {
            font-size: 1.8rem;
            font-weight: 800;
            font-family: 'Outfit', sans-serif;
        }

        .stat-label {
            color: #94a3b8;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .stat-trend {
            font-size: 0.75rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .trend-up { color: #10b981; }
        .trend-down { color: #ef4444; }

        /* Table Styles */
        .admin-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        .admin-table th {
            text-align: left;
            color: #94a3b8;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            padding: 1rem;
            border-bottom: 1px solid var(--admin-border);
        }

        .admin-table td {
            padding: 1rem;
            border-bottom: 1px solid var(--admin-border);
            font-size: 0.9rem;
        }

        .admin-tag {
            padding: 0.25rem 0.75rem;
            border-radius: 8px;
            font-size: 0.75rem;
            font-weight: 700;
        }

        .tag-success { background: rgba(16, 185, 129, 0.1); color: #10b981; }
        .tag-warning { background: rgba(245, 158, 11, 0.1); color: #f59e0b; }

        @media (max-width: 768px) {
            .sidebar { width: 0; padding: 0; overflow: hidden; }
            .main-content { margin-left: 0; }
        }
    </style>
</head>
<body>

    <aside class="sidebar">
        <a href="/" class="sidebar-brand">
            <div class="sidebar-logo">🛒</div>
            <span class="text-xl font-bold tracking-tight font-outfit text-white">Trendify Admin</span>
        </a>

        <nav class="sidebar-nav">
            <div class="nav-item">
                <a href="/admin" class="nav-link active">
                    <i>📊</i> Dashboard
                </a>
            </div>
            <div class="nav-item">
                <a href="/product" class="nav-link">
                    <i>📦</i> Productos
                </a>
            </div>
            <div class="nav-item">
                <a href="#" class="nav-link">
                    <i>🛒</i> Pedidos
                </a>
            </div>
            <div class="nav-item">
                <a href="#" class="nav-link">
                    <i>👥</i> Clientes
                </a>
            </div>
            <div class="nav-item" style="margin-top: 2rem;">
                <p style="font-size: 0.65rem; color: #475569; text-transform: uppercase; letter-spacing: 0.1em; padding: 0 1rem; margin-bottom: 0.5rem;">Configuración</p>
                <a href="#" class="nav-link">
                    <i>⚙️</i> Ajustes
                </a>
                <a href="#" class="nav-link">
                    <i>🔒</i> Seguridad
                </a>
            </div>
        </nav>

        <div class="mt-auto">
            <a href="/" class="nav-link" style="color: #ef4444;">
                <i>🚪</i> Salir al Sitio
            </a>
        </div>
    </aside>

    <main class="main-content">
        <header class="top-bar">
            <div>
                <h1 class="text-2xl font-bold font-outfit">Buen día, Jose</h1>
                <p style="color: #94a3b8; font-size: 0.9rem;">Esto es lo que está pasando hoy.</p>
            </div>

            <div class="user-profile">
                <div class="avatar"></div>
                <div style="font-size: 0.85rem;">
                    <p class="font-bold">Jose santipx</p>
                    <p style="color: #94a3b8; font-size: 0.75rem;">Administrador</p>
                </div>
            </div>
        </header>

        @yield('content')
    </main>

</body>
</html>
