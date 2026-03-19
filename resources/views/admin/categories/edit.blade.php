@extends('layouts.admin')

@section('content')

<div class="mb-8 items-start">
    <a href="{{ route('categories.index') }}" class="text-blue-500 hover:text-blue-400 font-bold mb-4 inline-block transition-colors">
        ← Volver a Categorías
    </a>
    <h1 class="text-3xl font-black font-outfit">Editar Categoría</h1>
    <p style="color: #94a3b8;">Estás editando la categoría: <span class="text-blue-400 font-bold">{{ $category->name }}</span>.</p>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <div class="lg:col-span-2">
        <form action="{{ route('categories.update', $category) }}" method="POST" class="admin-card">
            @csrf
            @method('PUT')
            
            <div class="mb-6">
                <label for="name" class="block text-xs font-bold uppercase tracking-widest text-slate-500 mb-2">Nombre de la Categoría</label>
                <input type="text" name="name" id="name" class="w-full px-5 py-4 bg-slate-800 border-2 border-slate-700 rounded-2xl focus:outline-none focus:border-blue-500 text-white font-medium" value="{{ old('name', $category->name) }}">
                @error('name')
                    <p class="text-red-500 text-xs mt-2 font-bold">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-8">
                <label for="description" class="block text-xs font-bold uppercase tracking-widest text-slate-500 mb-2">Descripción</label>
                <textarea name="description" id="description" rows="5" class="w-full px-5 py-4 bg-slate-800 border-2 border-slate-700 rounded-2xl focus:outline-none focus:border-blue-500 text-white font-medium">{{ old('description', $category->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-2 font-bold">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-4">
                <button type="submit" class="px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white rounded-3xl font-black text-lg transition-all shadow-xl shadow-blue-600/20 active:scale-95">
                    Guardar Cambios
                </button>
                <a href="{{ route('categories.index') }}" class="px-8 py-4 bg-slate-800 hover:bg-slate-700 text-white rounded-3xl font-black text-lg transition-all border border-slate-700">
                    Cancelar
                </a>
            </div>
        </form>
    </div>

    <div class="lg:col-span-1">
        <div class="admin-card" style="border-left: 4px solid #3b82f6;">
            <div class="w-12 h-12 bg-blue-500/10 text-blue-500 rounded-2xl flex items-center justify-center text-xl mb-6">✏️</div>
            <h3 class="text-xl font-bold font-outfit mb-4">Actualizar Categoría</h3>
            <p style="color: #94a3b8; font-size: 0.9rem; line-height: 1.6;">
                Modificar los nombres puede afectar las URLs si usas slugs, asegúrate de que sea lo que deseas hacer. <br><br>
                Los productos asociados seguirán vinculados a este ID aunque cambies el nombre.
            </p>
        </div>
    </div>
</div>

@endsection
