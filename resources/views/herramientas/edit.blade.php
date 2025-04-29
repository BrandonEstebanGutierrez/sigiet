@extends('layouts.app')

@section('title', 'Editar Herramienta')

@section('content')
    <h1 class="mb-4">Editar Herramienta</h1>

    <form action="{{ route('herramientas.update', $herramienta) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="nombre" value="{{ old('nombre', $herramienta->nombre) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Tipo</label>
            <select name="tipo" class="form-control" required>
                <option value="ligera" {{ $herramienta->tipo == 'ligera' ? 'selected' : '' }}>Ligera</option>
                <option value="pesada" {{ $herramienta->tipo == 'pesada' ? 'selected' : '' }}>Pesada</option>
            </select>
        </div>

        <div class="form-group">
            <label>Descripción</label>
            <textarea name="descripcion" class="form-control" required>{{ old('descripcion', $herramienta->descripcion) }}</textarea>
        </div>

        <div class="form-group">
            <label>Estado de Mantenimiento</label>
            <select name="estado_mantenimiento" class="form-control" required>
                <option value="disponible" {{ $herramienta->estado_mantenimiento == 'disponible' ? 'selected' : '' }}>Disponible</option>
                <option value="en uso" {{ $herramienta->estado_mantenimiento == 'en uso' ? 'selected' : '' }}>En uso</option>
                <option value="dañada" {{ $herramienta->estado_mantenimiento == 'dañada' ? 'selected' : '' }}>Dañada</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-4">Actualizar Herramienta</button>
    </form>
@endsection
