@extends('layouts.app')

@section('title', 'Bodegas')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Bodegas</h1>
        <a href="{{ route('bodegas.create') }}" class="btn btn-primary">Nueva Bodega</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Nombre</th>
                <th>Ubicación</th>
                <th>¿Principal?</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bodegas as $bodega)
                <tr>
                    <td>{{ $bodega->nombre }}</td>
                    <td>{{ $bodega->ubicacion }}</td>
                    <td>{{ $bodega->principal ? 'Sí' : 'No' }}</td>
                    <td>
                        @if (!$bodega->principal)
                            <a href="{{ route('bodegas.edit', $bodega) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('bodegas.destroy', $bodega) }}" method="POST" class="d-inline-block" onsubmit="return confirm('¿Seguro que deseas eliminar esta bodega?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        @else
                            <span class="badge bg-info text-white">Bodega Principal</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
