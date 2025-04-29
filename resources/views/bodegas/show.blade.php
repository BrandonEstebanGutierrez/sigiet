@extends('layouts.app')

@section('title', 'Detalle de Bodega')

@section('content')
    <h1 class="mb-4">Detalle de la Bodega</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>Nombre:</strong> {{ $bodega->nombre }}</p>
            <p><strong>Ubicación:</strong> {{ $bodega->ubicacion }}</p>
            <p><strong>¿Principal?:</strong> {{ $bodega->principal ? 'Sí' : 'No' }}</p>
        </div>
    </div>

    <a href="{{ route('bodegas.index') }}" class="btn btn-secondary mt-3">Volver</a>
@endsection
