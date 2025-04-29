@extends('layouts.app')

@section('title', 'Detalle de Material')

@section('content')
    <h1 class="mb-4">Detalle del Material</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>Nombre:</strong> {{ $material->nombre }}</p>
            <p><strong>Unidad de Medida:</strong> {{ $material->unidad_medida }}</p>
            <p><strong>Cantidad:</strong> {{ $material->cantidad }}</p>
            <p><strong>Precio Unitario:</strong> ${{ number_format($material->precio_unitario, 2) }}</p>
            <p><strong>Precio Total:</strong> ${{ number_format($material->precio_total, 2) }}</p>
        </div>
    </div>

    <a href="{{ route('materiales.index') }}" class="btn btn-secondary mt-3">Volver</a>
@endsection
