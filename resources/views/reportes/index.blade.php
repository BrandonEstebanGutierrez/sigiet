@extends('layouts.app')

@section('title', 'Reportes')

@section('content')
    <h1 class="mb-4">Reportes del Sistema</h1>

    <div class="row">
        <div class="col-md-3 mb-3">
            <a href="{{ route('reportes.material') }}" class="btn btn-outline-primary btn-block">
                Inventario General
            </a>
        </div>
        <div class="col-md-3 mb-3">
            <a href="{{ route('reportes.egresos') }}" class="btn btn-outline-success btn-block">
                Egresos por Bodega
            </a>
        </div>
        <div class="col-md-3 mb-3">
            <a href="{{ route('reportes.top-materiales') }}" class="btn btn-outline-warning btn-block">
                Top 10 Materiales Usados
            </a>
        </div>
        <div class="col-md-3 mb-3">
            <a href="{{ route('reportes.prestamos') }}" class="btn btn-outline-info btn-block">
                Préstamos de Herramientas
            </a>
        </div>
        <div class="col-md-3 mb-3">
        <a href="{{ route('reportes.inventario_por_bodega') }}" class="btn btn-outline-dark btn-block">
                Inventario por Bodega
            </a>
        </div>
    </div>
@endsection
