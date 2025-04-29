@extends('layouts.app')

@section('title', 'Registrar Movimiento')

@section('content')
    <h1 class="mb-4">Registrar Nuevo Movimiento</h1>

    <form action="{{ route('movimientos.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Tipo de Movimiento</label>
            <select name="tipo" class="form-control" required onchange="mostrarCampos()">
                <option value="">-- Selecciona --</option>
                <option value="entrada">Entrada</option>
                <option value="salida">Salida</option>
                <option value="préstamo">Préstamo</option>
                <option value="devolución">Devolución</option>
                <option value="traslado">Traslado</option>
            </select>
        </div>

        <div class="form-group">
            <label>Material (opcional)</label>
            <select name="material_id" class="form-control">
                <option value="">-- Selecciona un material --</option>
                @foreach ($materiales as $material)
                    <option value="{{ $material->id }}">{{ $material->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Herramienta (opcional)</label>
            <select name="herramienta_id" class="form-control">
                <option value="">-- Selecciona una herramienta --</option>
                @foreach ($herramientas as $herramienta)
                    <option value="{{ $herramienta->id }}">{{ $herramienta->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Cantidad</label>
            <input type="number" name="cantidad" class="form-control" required min="1">
        </div>

        <div class="form-group">
            <label>Bodega Origen</label>
            <select name="bodega_origen_id" class="form-control" required>
                <option value="">-- Selecciona --</option>
                @foreach ($bodegas as $bodega)
                    <option value="{{ $bodega->id }}">{{ $bodega->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div id="campoBodegaDestino" class="form-group" style="display: none;">
            <label>Bodega Destino (solo para traslados)</label>
            <select name="bodega_destino_id" class="form-control">
                <option value="">-- Selecciona --</option>
                @foreach ($bodegas as $bodega)
                    <option value="{{ $bodega->id }}">{{ $bodega->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Fecha</label>
            <input type="date" name="fecha" class="form-control" required value="{{ date('Y-m-d') }}">
        </div>

        <div class="form-group">
            <label>Observaciones</label>
            <textarea name="observaciones" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-success mt-4">Registrar Movimiento</button>
    </form>

    <script>
        function mostrarCampos() {
            var tipo = document.querySelector('[name="tipo"]').value;
            var campoDestino = document.getElementById('campoBodegaDestino');
            if (tipo === 'traslado') {
                campoDestino.style.display = 'block';
            } else {
                campoDestino.style.display = 'none';
            }
        }
    </script>
@endsection
