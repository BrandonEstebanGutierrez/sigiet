@extends('layouts.app')

@section('title', 'Inventario por Bodega')

@section('content')
    <h1>Inventario por Bodega</h1>

    <form method="GET" action="{{ route('reportes.inventario_por_bodega') }}" class="mb-4">
        <div class="form-group">
            <label for="bodega_id">Seleccionar Bodega</label>
            <select name="bodega_id" id="bodega_id" class="form-control" onchange="this.form.submit()">
                <option value="">-- Selecciona una bodega --</option>
                @foreach ($bodegas as $bodega)
                    <option value="{{ $bodega->id }}" {{ $bodega_id == $bodega->id ? 'selected' : '' }}>
                        {{ $bodega->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
    </form>

    @if($bodega_id)
        <h3>Materiales</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Unidad</th>
                    <th>Precio Unitario</th>
                </tr>
            </thead>
            <tbody>
                @forelse($materiales as $material)
                    <tr>
                        <td>{{ $material->nombre }}</td>
                        <td>{{ $material->cantidad }}</td>
                        <td>{{ $material->unidad_medida }}</td>
                        <td>${{ $material->precio_unitario }}</td>
                    </tr>
                @empty
                    <tr><td colspan="4">No hay materiales en esta bodega.</td></tr>
                @endforelse
            </tbody>
        </table>

        <h3>Herramientas</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @forelse($herramientas as $herramienta)
                    <tr>
                        <td>{{ $herramienta->nombre }}</td>
                        <td>{{ ucfirst($herramienta->tipo) }}</td>
                        <td>{{ ucfirst($herramienta->estado_mantenimiento) }}</td>
                    </tr>
                @empty
                    <tr><td colspan="3">No hay herramientas en esta bodega.</td></tr>
                @endforelse
            </tbody>
        </table>
    @endif
@endsection
