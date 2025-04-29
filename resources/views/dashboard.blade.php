@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>Bienvenido, {{ auth()->user()->rol->nombre }}</h1>

        <div class="row mt-5">
            <div class="col-md-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Materiales</h5>
                        <p class="card-text">0</p>
                        <small class="text-muted">Total de materiales registrados.</small>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Herramientas</h5>
                        <p class="card-text">0</p>
                        <small class="text-muted">Total de herramientas.</small>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Bodegas</h5>
                        <p class="card-text">0</p>
                        <small class="text-muted">Total de bodegas.</small>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Movimientos</h5>
                        <p class="card-text">0</p>
                        <small class="text-muted">Total de movimientos.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
