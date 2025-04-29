@extends('layouts.app')

@section('title', 'Detalle Usuario')

@section('content')
    <h1 class="mb-4">Detalle de Usuario</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>Nombre:</strong> {{ $usuario->nombre }}</p>
            <p><strong>Email:</strong> {{ $usuario->email }}</p>
            <p><strong>Rol:</strong> {{ $usuario->rol->nombre }}</p>
            <p><strong>Bodega Asignada:</strong> {{ $usuario->bodega->nombre ?? 'No asignada' }}</p>
        </div>
    </div>

    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary mt-3">Volver</a>
@endsection
