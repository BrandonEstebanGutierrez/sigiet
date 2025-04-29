@extends('layouts.app')

@section('title', 'Detalle de Herramienta')

@section('content')
    <h1 class="mb-4">Detalle de Herramienta</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>Nombre:</strong> {{ $herramienta->nombre }}</p>
            <p><strong>Tipo:</strong> {{ ucfirst($herramienta->tipo) }}</p>
            <p><strong>Descripción:</strong> {{ $herramienta->descripcion }}</p>
            <p><strong>Estado de Mantenimiento:</strong> {{ ucfirst($herramienta->estado_mantenimiento) }}</p>
            <p><strong>Empleado Asignado:</strong> {{ optional($herramienta->empleadoAsignado)->nombre ?? 'No asignado' }}</p>
        </div>
    </div>

    <a href="{{ route('herramientas.index') }}" class="btn btn-secondary mt-3">Volver</a>
@endsection
