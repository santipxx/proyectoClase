@extends('layouts.admin')

@section('content')

<div class="flex items-center justify-between mb-8">
    <div>
        <h1 class="text-3xl font-black font-outfit">Gestión de Categorías</h1>
        <p style="color: #94a3b8;">Administra las categorías de tus productos.</p>
    </div>
    <a href="{{ route('categories.create') }}" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-2xl font-bold transition-all shadow-lg shadow-blue-500/20 flex items-center gap-2">
        <span style="font-size: 1.2rem;">+</span> Nueva Categoría
    </a>
</div>

@if(session('success'))
    <div class="mb-6 p-4 bg-emerald-500/10 border border-emerald-500/20 text-emerald-500 rounded-xl font-medium">
        {{ session('success') }}
    </div>
@endif

<div class="admin-card">
    <table class="admin-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
                <tr>
                    <td class="font-bold text-slate-500">#{{ $category->id }}</td>
                    <td><span class="font-bold text-white">{{ $category->name }}</span></td>
                    <td style="color: #94a3b8;">{{ Str::limit($category->description, 50) }}</td>
                    <td>
                        <div class="flex items-center gap-3">
                            <a href="{{ route('categories.edit', $category) }}" class="p-2 bg-slate-800 hover:bg-slate-700 rounded-lg text-blue-400 transition-colors" title="Editar">
                                <i>✏️</i>
                            </a>
                            <form action="{{ route('categories.destroy', $category) }}" method="POST" onsubmit="return confirm('¿Eliminar esta categoría?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 bg-slate-800 hover:bg-red-500/20 rounded-lg text-red-500 transition-colors" title="Eliminar">
                                    <i>🗑️</i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align: center; padding: 4rem; color: #64748b;">
                        No hay categorías registradas.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
