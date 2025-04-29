@extends('layouts.app')

@section('title', 'Materiales')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Materiales</h1>
        <a href="{{ route('materiales.create') }}" class="btn btn-primary">Nuevo Material</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Nombre</th>
                <th>Unidad de Medida</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Precio Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($materiales as $material)
                <tr>
                    <td>{{ $material->nombre }}</td>
                    <td>{{ $material->unidad_medida }}</td>
                    <td>{{ $material->cantidad }}</td>
                    <td>${{ number_format($material->precio_unitario, 2) }}</td>
                    <td>${{ number_format($material->precio_total, 2) }}</td>
                    <td>
                        <a href="{{ route('materiales.edit', $material) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('materiales.destroy', $material) }}" method="POST" class="d-inline-block" onsubmit="return confirm('¿Seguro que deseas eliminar este material?')">
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
