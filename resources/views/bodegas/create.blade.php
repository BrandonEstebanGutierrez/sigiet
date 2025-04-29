@extends('layouts.app')

@section('title', 'Crear Bodega')

@section('content')
    <h1 class="mb-4">Crear Nueva Bodega</h1>

    <form action="{{ route('bodegas.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Ubicación</label>
            <input type="text" name="ubicacion" class="form-control" required>
        </div>

        <div class="form-check mt-3">
            <input type="checkbox" name="principal" value="1" class="form-check-input" id="principalCheck">
            <label class="form-check-label" for="principalCheck">¿Es Bodega Principal?</label>
        </div>

        <button type="submit" class="btn btn-success mt-4">Guardar Bodega</button>
    </form>
@endsection
