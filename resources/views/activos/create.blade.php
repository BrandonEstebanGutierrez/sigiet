@extends('layouts.app')

@section('title', 'Crear Activo')

@section('content')
    <h1 class="mb-4">Crear Nuevo Activo</h1>

    <form action="{{ route('activos.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Tipo</label>
            <input type="text" name="tipo" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Marca</label>
            <input type="text" name="marca" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Número de Serie</label>
            <input type="text" name="numero_serie" class="form-control">
        </div>

        <div class="form-group">
            <label>Cantidad</label>
            <input type="number" name="cantidad" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Valor Unitario ($)</label>
            <input type="number" step="0.01" name="valor_unitario" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Estado</label>
            <select name="estado" class="form-control" required>
                <option value="nuevo">Nuevo</option>
                <option value="usado">Usado</option>
                <option value="en reparación">En reparación</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success mt-4">Guardar Activo</button>
    </form>
@endsection
