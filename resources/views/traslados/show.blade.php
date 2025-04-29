@extends('layouts.app')

@section('title', 'Detalle del Traslado')

@section('content')
    <h1 class="mb-4">Detalle del Traslado</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>Fecha:</strong> {{ \Carbon\Carbon::parse($traslado->fecha)->format('d/m/Y') }}</p>
            <p><strong>Origen:</strong> {{ $traslado->bodegaOrigen->nombre }}</p>
            <p><strong>Destino:</strong> {{ $traslado->bodegaDestino->nombre }}</p>
            <p><strong>Tipo:</strong> {{ ucfirst($traslado->tipo) }}</p>
            <p><strong>Observaciones:</strong> {{ $traslado->observaciones ?? 'Ninguna' }}</p>

            @if($traslado->material)
                <p><strong>Material:</strong> {{ $traslado->material->nombre }}</p>
                <p><strong>Cantidad:</strong> {{ $traslado->cantidad }}</p>
            @elseif($traslado->herramienta)
                <p><strong>Herramienta:</strong> {{ $traslado->herramienta->nombre }}</p>
                <p><strong>Cantidad:</strong> 1</p>
            @endif

            <p><strong>Estado:</strong> 
                @if($traslado->estado == 'pendiente')
                    <span class="badge badge-warning">Pendiente</span>
                @else
                    <span class="badge badge-success">Confirmado</span>
                @endif
            </p>

            @if($traslado->documento_pdf)
                <a href="{{ asset('storage/' . $traslado->documento_pdf) }}" target="_blank" class="btn btn-primary mt-3">
                    Ver Documento PDF
                </a>
            @endif
        </div>
    </div>
@endsection
