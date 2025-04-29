@extends('layouts.app')

@section('title', 'Editar Material')

@section('content')
    <h1 class="mb-4">Editar Material</h1>

    <form action="{{ route('materiales.update', $material) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="nombre" value="{{ old('nombre', $material->nombre) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Unidad de Medida</label>
            <input type="text" name="unidad_medida" value="{{ old('unidad_medida', $material->unidad_medida) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Cantidad</label>
            <input type="number" name="cantidad" value="{{ old('cantidad', $material->cantidad) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Precio Unitario ($)</label>
            <input type="number" step="0.01" name="precio_unitario" value="{{ old('precio_unitario', $material->precio_unitario) }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary mt-4">Actualizar Material</button>
    </form>
@endsection
