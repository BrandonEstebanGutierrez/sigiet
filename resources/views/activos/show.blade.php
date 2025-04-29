@extends('layouts.app')

@section('title', 'Detalle de Activo')

@section('content')
    <h1 class="mb-4">Detalle del Activo</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>Nombre:</strong> {{ $activo->nombre }}</p>
            <p><strong>Tipo:</strong> {{ $activo->tipo }}</p>
            <p><strong>Marca:</strong> {{ $activo->marca }}</p>
            <p><strong>Número de Serie:</strong> {{ $activo->numero_serie }}</p>
            <p><strong>Cantidad:</strong> {{ $activo->cantidad }}</p>
            <p><strong>Valor Unitario:</strong> ${{ number_format($activo->valor_unitario, 2) }}</p>
            <p><strong>Valor Total:</strong> ${{ number_format($activo->valor_total, 2) }}</p>
            <p><strong>Estado:</strong> {{ ucfirst($activo->estado) }}</p>
        </div>
    </div>

    <a href="{{ route('activos.index') }}" class="btn btn-secondary mt-3">Volver</a>
@endsection
