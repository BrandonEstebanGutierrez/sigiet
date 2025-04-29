@extends('layouts.app')

@section('title', 'Registrar Préstamo')

@section('content')
    <h1 class="mb-4">Registrar Préstamo de Herramienta</h1>

    <form action="{{ route('prestamos.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Herramienta</label>
            <select name="herramienta_id" class="form-control" required>
                <option value="">-- Selecciona Herramienta --</option>
                @foreach ($herramientas as $herramienta)
                    @if($herramienta->estado_mantenimiento == 'disponible')
                        <option value="{{ $herramienta->id }}">{{ $herramienta->nombre }} ({{ $herramienta->descripcion }})</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Empleado Responsable</label>
            <input type="text" name="empleado_nombre" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Fecha de Préstamo</label>
            <input type="date" name="fecha_prestamo" class="form-control" required value="{{ date('Y-m-d') }}">
        </div>

        <button type="submit" class="btn btn-success mt-4">Registrar Préstamo</button>
    </form>
@endsection
