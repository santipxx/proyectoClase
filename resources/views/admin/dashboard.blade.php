@extends('layouts.admin')

@section('content')

<!-- Stat Cards -->
<div class="stat-grid">
    <div class="admin-card stat-card">
        <span class="stat-label">Ingresos Totales</span>
        <div class="flex items-end justify-between">
            <span class="stat-value">$12.450.000</span>
            <span class="stat-trend trend-up">↑ 12%</span>
        </div>
    </div>
    <div class="admin-card stat-card">
        <span class="stat-label">Pedidos del Mes</span>
        <div class="flex items-end justify-between">
            <span class="stat-value">158</span>
            <span class="stat-trend trend-up">↑ 5%</span>
        </div>
    </div>
    <div class="admin-card stat-card">
        <span class="stat-label">Nuevos Clientes</span>
        <div class="flex items-end justify-between">
            <span class="stat-value">42</span>
            <span class="stat-trend trend-down">↓ 2%</span>
        </div>
    </div>
    <div class="admin-card stat-card" style="border-left: 4px solid var(--admin-accent);">
        <span class="stat-label">Productos Activos</span>
        <div class="flex items-end justify-between">
            <span class="stat-value">1.240</span>
            <span class="stat-trend" style="color: #94a3b8;">Estable</span>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Recent Activity -->
    <div class="admin-card">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-lg font-bold font-outfit">Actividad Reciente</h2>
            <a href="#" style="color: var(--admin-accent); font-size: 0.8rem; font-weight: 600;">Ver todo</a>
        </div>
        
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Estado</th>
                    <th>Monto</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <p class="font-bold">Ana Martínez</p>
                        <p style="font-size: 0.7rem; color: #64748b;">hace 5 min</p>
                    </td>
                    <td><span class="admin-tag tag-success">Completado</span></td>
                    <td class="font-bold">$125.000</td>
                </tr>
                <tr>
                    <td>
                        <p class="font-bold">Carlos Ruiz</p>
                        <p style="font-size: 0.7rem; color: #64748b;">hace 25 min</p>
                    </td>
                    <td><span class="admin-tag tag-warning">Pendiente</span></td>
                    <td class="font-bold">$89.900</td>
                </tr>
                <tr>
                    <td>
                        <p class="font-bold">Elena Gomez</p>
                        <p style="font-size: 0.7rem; color: #64748b;">hace 1 hora</p>
                    </td>
                    <td><span class="admin-tag tag-success">Completado</span></td>
                    <td class="font-bold">$450.000</td>
                </tr>
                <tr>
                    <td>
                        <p class="font-bold">Juan Pérez</p>
                        <p style="font-size: 0.7rem; color: #64748b;">hace 3 horas</p>
                    </td>
                    <td><span class="admin-tag tag-success">Completado</span></td>
                    <td class="font-bold">$23.000</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Quick Analytics / Chart Placeholder -->
    <div class="admin-card">
        <h2 class="text-lg font-bold font-outfit mb-6">Rendimiento Semanal</h2>
        <div style="height: 300px; background: rgba(59, 130, 246, 0.05); border: 2px dashed var(--admin-border); border-radius: 16px; display: flex; align-items: center; justify-content: center; flex-direction: column; gap: 1rem;">
            <div class="flex items-end gap-2" style="height: 150px;">
                <div style="width: 20px; height: 40%; background: var(--admin-accent); border-radius: 4px;"></div>
                <div style="width: 20px; height: 70%; background: var(--admin-accent); border-radius: 4px;"></div>
                <div style="width: 20px; height: 100%; background: var(--admin-accent); border-radius: 4px;"></div>
                <div style="width: 20px; height: 60%; background: var(--admin-accent); border-radius: 4px;"></div>
                <div style="width: 20px; height: 85%; background: var(--admin-accent); border-radius: 4px;"></div>
                <div style="width: 20px; height: 30%; background: var(--admin-accent); border-radius: 4px;"></div>
                <div style="width: 20px; height: 55%; background: var(--admin-accent); border-radius: 4px;"></div>
            </div>
            <p style="color: #64748b; font-size: 0.85rem;">Analíticas en tiempo real activadas</p>
        </div>
    </div>
</div>

@endsection
