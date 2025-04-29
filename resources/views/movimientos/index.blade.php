@extends('layouts.app')

@section('title', 'Movimientos de Inventario')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Movimientos</h1>
        <a href="{{ route('movimientos.create') }}" class="btn btn-primary">Nuevo Movimiento</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Tipo</th>
                <th>Material/Herramienta</th>
                <th>Cantidad</th>
                <th>Bodega Origen</th>
                <th>Bodega Destino</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Documento PDF</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movimientos as $movimiento)
                <tr>
                    <td>{{ ucfirst($movimiento->tipo) }}</td>
                    <td>
                        @if($movimiento->material)
                            {{ $movimiento->material->nombre }}
                        @elseif($movimiento->herramienta)
                            {{ $movimiento->herramienta->nombre }}
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $movimiento->cantidad }}</td>
                    <td>{{ optional($movimiento->bodegaOrigen)->nombre ?? '-' }}</td>
                    <td>{{ optional($movimiento->bodegaDestino)->nombre ?? '-' }}</td>
                    <td>
                        @if($movimiento->fecha)
                            {{ \Carbon\Carbon::parse($movimiento->fecha)->format('d/m/Y') }}
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ ucfirst($movimiento->estado) }}</td>
                    <td>
                        @if($movimiento->documento_pdf)
                            <a href="{{ asset('storage/'.$movimiento->documento_pdf) }}" target="_blank" class="btn btn-sm btn-info">Ver PDF</a>
                        @else
                            No disponible
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
