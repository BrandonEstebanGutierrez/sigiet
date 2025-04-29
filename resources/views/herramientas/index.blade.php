@extends('layouts.app')

@section('title', 'Herramientas')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Herramientas</h1>
        <a href="{{ route('herramientas.create') }}" class="btn btn-primary">Nueva Herramienta</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Descripción</th>
                <th>Estado Mantenimiento</th>
                <th>Empleado Asignado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($herramientas as $herramienta)
                <tr>
                    <td>{{ $herramienta->nombre }}</td>
                    <td>{{ ucfirst($herramienta->tipo) }}</td>
                    <td>{{ $herramienta->descripcion }}</td>
                    <td>{{ ucfirst($herramienta->estado_mantenimiento) }}</td>
                    <td>{{ optional($herramienta->empleadoAsignado)->nombre ?? 'No asignado' }}</td>
                    <td>
                        <a href="{{ route('herramientas.edit', $herramienta) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('herramientas.destroy', $herramienta) }}" method="POST" class="d-inline-block" onsubmit="return confirm('¿Seguro que deseas eliminar esta herramienta?')">
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
