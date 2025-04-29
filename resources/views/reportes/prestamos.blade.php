@extends('layouts.app')

@section('title', 'Reporte de Préstamos de Herramientas')

@section('content')
    <h1 class="mb-4">Préstamos de Herramientas</h1>

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Herramienta</th>
                <th>Empleado Responsable</th>
                <th>Fecha de Préstamo</th>
                <th>Fecha de Devolución</th>
                <th>Estado Actual</th>
            </tr>
        </thead>
        <tbody>
            @foreach($prestamos as $prestamo)
                <tr>
                    <td>{{ $prestamo->nombre_herramienta }}</td>
                    <td>{{ $prestamo->empleado_nombre ?? 'No asignado' }}</td>
                    <td>{{ $prestamo->fecha_prestamo ? \Carbon\Carbon::parse($prestamo->fecha_prestamo)->format('d/m/Y') : '-' }}</td>
                    <td>{{ $prestamo->fecha_devolucion ? \Carbon\Carbon::parse($prestamo->fecha_devolucion)->format('d/m/Y') : '-' }}</td>
                    <td>{{ ucfirst($prestamo->estado_mantenimiento) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
