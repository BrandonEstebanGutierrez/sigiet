@extends('layouts.app')

@section('title', 'Crear Herramienta')

@section('content')
    <h1 class="mb-4">Crear Nueva Herramienta</h1>

    <form action="{{ route('herramientas.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Tipo</label>
            <select name="tipo" class="form-control" required>
                <option value="ligera">Ligera</option>
                <option value="pesada">Pesada</option>
            </select>
        </div>

        <div class="form-group">
            <label>Descripción</label>
            <textarea name="descripcion" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label>Estado de Mantenimiento</label>
            <select name="estado_mantenimiento" class="form-control" required>
                <option value="disponible">Disponible</option>
                <option value="en uso">En uso</option>
                <option value="dañada">Dañada</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success mt-4">Guardar Herramienta</button>
    </form>
@endsection
