@extends('layouts.app')

@section('title', 'Editar Bodega')

@section('content')
    <h1 class="mb-4">Editar Bodega</h1>

    <form action="{{ route('bodegas.update', $bodega) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $bodega->nombre) }}" required>
        </div>

        <div class="form-group">
            <label>Ubicación</label>
            <input type="text" name="ubicacion" class="form-control" value="{{ old('ubicacion', $bodega->ubicacion) }}" required>
        </div>

        @if (!$bodega->principal)
            <div class="form-check mt-3">
                <input type="checkbox" name="principal" value="1" class="form-check-input" id="principalCheck" {{ $bodega->principal ? 'checked' : '' }}>
                <label class="form-check-label" for="principalCheck">¿Es Bodega Principal?</label>
            </div>
        @else
            <div class="alert alert-info mt-3">
                Esta es la bodega principal y no puede ser cambiada ni eliminada.
            </div>
        @endif

        <button type="submit" class="btn btn-primary mt-4">Actualizar Bodega</button>
    </form>
@endsection
