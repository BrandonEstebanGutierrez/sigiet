@extends('layouts.app')

@section('title', 'Reporte de Inventario')

@section('content')
    <h1 class="mb-4">Inventario General</h1>

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Cantidad</th>
                <th>Unidad/Estado</th>
                <th>Valor Unitario</th>
                <th>Valor Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($materiales as $material)
                <tr>
                    <td>{{ $material->nombre }}</td>
                    <td>Material</td>
                    <td>{{ $material->cantidad }}</td>
                    <td>{{ $material->unidad_medida }}</td>
                    <td>${{ number_format($material->valor_unitario, 2) }}</td>
                    <td>${{ number_format($material->cantidad * $material->valor_unitario, 2) }}</td>
                </tr>
            @endforeach
            @foreach($herramientas as $herramienta)
                <tr>
                    <td>{{ $herramienta->nombre }}</td>
                    <td>Herramienta ({{ ucfirst($herramienta->tipo) }})</td>
                    <td>1</td>
                    <td>{{ ucfirst($herramienta->estado_mantenimiento) }}</td>
                    <td>-</td>
                    <td>-</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
