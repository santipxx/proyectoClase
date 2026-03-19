@extends('layouts.admin')

@section('content')

<div class="mb-8 items-start">
    <a href="{{ route('categories.index') }}" class="text-blue-500 hover:text-blue-400 font-bold mb-4 inline-block transition-colors">
        ← Volver a Categorías
    </a>
    <h1 class="text-3xl font-black font-outfit">Nueva Categoría</h1>
    <p style="color: #94a3b8;">Ingresa los datos para crear una categoría de producto.</p>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <div class="lg:col-span-2">
        <form action="{{ route('categories.store') }}" method="POST" class="admin-card">
            @csrf
            
            <div class="mb-6">
                <label for="name" class="block text-xs font-bold uppercase tracking-widest text-slate-500 mb-2">Nombre de la Categoría</label>
                <input type="text" name="name" id="name" class="w-full px-5 py-4 bg-slate-800 border-2 border-slate-700 rounded-2xl focus:outline-none focus:border-blue-500 text-white font-medium" placeholder="Ej. Accesorios Gamer" value="{{ old('name') }}">
                @error('name')
                    <p class="text-red-500 text-xs mt-2 font-bold">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-8">
                <label for="description" class="block text-xs font-bold uppercase tracking-widest text-slate-500 mb-2">Descripción</label>
                <textarea name="description" id="description" rows="5" class="w-full px-5 py-4 bg-slate-800 border-2 border-slate-700 rounded-2xl focus:outline-none focus:border-blue-500 text-white font-medium" placeholder="Escribe aquí los detalles principales de la categoría...">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-2 font-bold">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-4">
                <button type="submit" class="px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white rounded-3xl font-black text-lg transition-all shadow-xl shadow-blue-600/20 active:scale-95">
                    Crear Categoría
                </button>
                <a href="{{ route('categories.index') }}" class="px-8 py-4 bg-slate-800 hover:bg-slate-700 text-white rounded-3xl font-black text-lg transition-all border border-slate-700">
                    Cancelar
                </a>
            </div>
        </form>
    </div>

    <div class="lg:col-span-1">
        <div class="admin-card" style="border-left: 4px solid #f59e0b;">
            <div class="w-12 h-12 bg-amber-500/10 text-amber-500 rounded-2xl flex items-center justify-center text-xl mb-6">💡</div>
            <h3 class="text-xl font-bold font-outfit mb-4">Consejo de Administración</h3>
            <p style="color: #94a3b8; font-size: 0.9rem; line-height: 1.6;">
                Usa nombres cortos y descriptivos para que los clientes puedan filtrar sus búsquedas fácilmente. <br><br>
                Una buena descripción ayuda en el posicionamiento SEO interno de tu tienda.
            </p>
        </div>
    </div>
</div>

@endsection
