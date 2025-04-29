@extends('layouts.app')

@section('title', 'Préstamos de Herramientas')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Préstamos de Herramientas</h1>
        <a href="{{ route('prestamos.create') }}" class="btn btn-primary">Nuevo Préstamo</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Herramienta</th>
                <th>Empleado Responsable</th>
                <th>Fecha de Préstamo</th>
                <th>Fecha de Devolución</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($prestamos as $prestamo)
                <tr>
                    <td>{{ $prestamo->herramienta->nombre }}</td>
                    <td>{{ $prestamo->empleado_nombre }}</td>
                    <td>{{ \Carbon\Carbon::parse($prestamo->fecha_prestamo)->format('d/m/Y') }}</td>
                    <td>
                        @if($prestamo->fecha_devolucion)
                            {{ \Carbon\Carbon::parse($prestamo->fecha_devolucion)->format('d/m/Y') }}
                        @else
                            <span class="badge badge-warning">Pendiente</span>
                        @endif
                    </td>
                    <td>
                        @if($prestamo->herramienta->estado_mantenimiento == 'en uso')
                            <span class="badge badge-info">En Uso</span>
                        @elseif($prestamo->herramienta->estado_mantenimiento == 'disponible')
                            <span class="badge badge-success">Disponible</span>
                        @elseif($prestamo->herramienta->estado_mantenimiento == 'dañada')
                            <span class="badge badge-danger">Dañada</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
