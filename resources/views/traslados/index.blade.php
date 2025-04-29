@extends('layouts.app')

@section('title', 'Traslados de Bodega')

@section('content')
    <h1 class="mb-4">Traslados Recibidos</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Fecha</th>
                <th>Origen</th>
                <th>Destino</th>
                <th>Tipo</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($traslados as $traslado)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($traslado->fecha)->format('d/m/Y') }}</td>
                    <td>{{ $traslado->bodegaOrigen->nombre }}</td>
                    <td>{{ $traslado->bodegaDestino->nombre }}</td>
                    <td>{{ ucfirst($traslado->tipo) }}</td>
                    <td>
                        @if($traslado->estado == 'pendiente')
                            <span class="badge badge-warning">Pendiente</span>
                        @else
                            <span class="badge badge-success">Confirmado</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('traslados.show', $traslado->id) }}" class="btn btn-info btn-sm">Ver Detalle</a>
                        @if($traslado->estado == 'pendiente')
                            <form action="{{ route('traslados.confirmar', $traslado->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-success btn-sm">Confirmar</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
