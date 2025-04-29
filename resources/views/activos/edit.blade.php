@extends('layouts.app')

@section('title', 'Editar Activo')

@section('content')
    <h1 class="mb-4">Editar Activo</h1>

    <form action="{{ route('activos.update', $activo) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="nombre" value="{{ old('nombre', $activo->nombre) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Tipo</label>
            <input type="text" name="tipo" value="{{ old('tipo', $activo->tipo) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Marca</label>
            <input type="text" name="marca" value="{{ old('marca', $activo->marca) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Número de Serie</label>
            <input type="text" name="numero_serie" value="{{ old('numero_serie', $activo->numero_serie) }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Cantidad</label>
            <input type="number" name="cantidad" value="{{ old('cantidad', $activo->cantidad) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Valor Unitario ($)</label>
            <input type="number" step="0.01" name="valor_unitario" value="{{ old('valor_unitario', $activo->valor_unitario) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Estado</label>
            <select name="estado" class="form-control" required>
                <option value="nuevo" {{ $activo->estado == 'nuevo' ? 'selected' : '' }}>Nuevo</option>
                <option value="usado" {{ $activo->estado == 'usado' ? 'selected' : '' }}>Usado</option>
                <option value="en reparación" {{ $activo->estado == 'en reparación' ? 'selected' : '' }}>En reparación</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-4">Actualizar Activo</button>
    </form>
@endsection
