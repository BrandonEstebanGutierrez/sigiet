@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Bienvenido, {{ $rol }}</h1>

    @if ($rol === 'Administrador' || $rol === 'Auditor')
        <div class="row">
            <div class="col-md-3">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Materiales</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $data['materiales'] }}</h5>
                        <p class="card-text">Total de materiales registrados.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Herramientas</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $data['herramientas'] }}</h5>
                        <p class="card-text">Total de herramientas.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-info mb-3">
                    <div class="card-header">Bodegas</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $data['bodegas'] }}</h5>
                        <p class="card-text">Total de bodegas.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-header">Movimientos</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $data['movimientos'] }}</h5>
                        <p class="card-text">Total de movimientos.</p>
                    </div>
                </div>
            </div>
        </div>

    @elseif ($rol === 'Gerente')
        <div class="card mb-4">
            <div class="card-header bg-success text-white">Bodega con más egresos</div>
            <div class="card-body">
                @if($data['bodega_top'])
                    <h5>{{ $data['bodega_top']->nombre }} ({{ $data['bodega_top']->total }} egresos)</h5>
                @else
                    <p>No hay egresos registrados aún.</p>
                @endif
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-primary text-white">Top 10 materiales más usados</div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach ($data['top_materiales'] as $material)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $material->nombre }}
                            <span class="badge badge-primary badge-pill">{{ $material->cantidad }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

    @elseif ($rol === 'Almacenista')
        <div class="row">
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Materiales en Bodega</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $data['materiales'] }}</h5>
                        <p class="card-text">Materiales disponibles.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Herramientas en Bodega</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $data['herramientas'] }}</h5>
                        <p class="card-text">Herramientas disponibles.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-info mb-3">
                    <div class="card-header">Movimientos Registrados</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $data['movimientos'] }}</h5>
                        <p class="card-text">Entradas, salidas y traslados.</p>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
