@extends('layouts.app')

@section('title', 'Egresos por Bodega')

@section('content')
    <h1 class="mb-4">Egresos por Bodega</h1>

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Bodega</th>
                <th>Total de Egresos</th>
            </tr>
        </thead>
        <tbody>
            @foreach($egresos as $egreso)
                <tr>
                    <td>{{ $egreso->nombre_bodega }}</td>
                    <td>{{ $egreso->total_egresos }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
