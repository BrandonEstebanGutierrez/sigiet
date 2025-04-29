@extends('layouts.app')

@section('title', 'Activos')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Activos</h1>
        <a href="{{ route('activos.create') }}" class="btn btn-primary">Nuevo Activo</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Marca</th>
                <th>Número de Serie</th>
                <th>Cantidad</th>
                <th>Valor Unitario</th>
                <th>Valor Total</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($activos as $activo)
                <tr>
                    <td>{{ $activo->nombre }}</td>
                    <td>{{ $activo->tipo }}</td>
                    <td>{{ $activo->marca }}</td>
                    <td>{{ $activo->numero_serie }}</td>
                    <td>{{ $activo->cantidad }}</td>
                    <td>${{ number_format($activo->valor_unitario, 2) }}</td>
                    <td>${{ number_format($activo->valor_total, 2) }}</td>
                    <td>{{ ucfirst($activo->estado) }}</td>
                    <td>
                        <a href="{{ route('activos.edit', $activo) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('activos.destroy', $activo) }}" method="POST" class="d-inline-block" onsubmit="return confirm('¿Seguro que deseas eliminar este activo?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
