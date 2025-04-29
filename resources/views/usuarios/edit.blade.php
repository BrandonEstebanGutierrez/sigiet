@extends('layouts.app')

@section('title', 'Editar Usuario')

@section('content')
    <h1 class="mb-4">Editar Usuario</h1>

    <form action="{{ route('usuarios.update', $usuario) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $usuario->nombre) }}" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $usuario->email) }}" required>
        </div>

        <div class="form-group">
            <label>Rol</label>
            <select name="rol_id" class="form-control" required>
                @foreach ($roles as $rol)
                    <option value="{{ $rol->id }}" {{ $usuario->rol_id == $rol->id ? 'selected' : '' }}>
                        {{ $rol->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Bodega (opcional)</label>
            <select name="bodega_id" class="form-control">
                <option value="">Sin asignar</option>
                @foreach ($bodegas as $bodega)
                    <option value="{{ $bodega->id }}" {{ $usuario->bodega_id == $bodega->id ? 'selected' : '' }}>
                        {{ $bodega->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Actualizar Usuario</button>
    </form>
@endsection
