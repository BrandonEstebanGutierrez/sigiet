@extends('layouts.app')

@section('title', 'Crear Usuario')

@section('content')
    <h1 class="mb-4">Crear Nuevo Usuario</h1>

    <form action="{{ route('usuarios.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Contraseña</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Rol</label>
            <select name="rol_id" class="form-control" required>
                <option value="">Seleccione un rol</option>
                @foreach ($roles as $rol)
                    <option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Bodega (opcional)</label>
            <select name="bodega_id" class="form-control">
                <option value="">Sin asignar</option>
                @foreach ($bodegas as $bodega)
                    <option value="{{ $bodega->id }}">{{ $bodega->nombre }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success mt-3">Guardar Usuario</button>
    </form>
@endsection
