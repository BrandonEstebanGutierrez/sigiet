@extends('layouts.app')

@section('title', 'Crear Material')

@section('content')
    <h1 class="mb-4">Crear Nuevo Material</h1>

    <form action="{{ route('materiales.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Unidad de Medida</label>
            <input type="text" name="unidad_medida" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Cantidad</label>
            <input type="number" name="cantidad" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Precio Unitario ($)</label>
            <input type="number" step="0.01" name="precio_unitario" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success mt-4">Guardar Material</button>
    </form>
@endsection
