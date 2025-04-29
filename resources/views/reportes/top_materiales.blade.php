@extends('layouts.app')

@section('title', 'Top 10 Materiales Más Usados')

@section('content')
    <h1 class="mb-4">Top 10 Materiales Más Usados</h1>

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Material</th>
                <th>Cantidad Usada</th>
            </tr>
        </thead>
        <tbody>
            @foreach($top_materiales as $material)
                <tr>
                    <td>{{ $material->nombre }}</td>
                    <td>{{ $material->cantidad_usada }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
