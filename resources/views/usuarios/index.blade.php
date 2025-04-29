@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Usuarios</h1>
        <a href="{{ route('usuarios.create') }}" class="btn btn-primary">
            <i data-lucide="plus"></i> Nuevo Usuario
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($usuarios->isEmpty())
        <div class="alert alert-info">
            No hay usuarios registrados aún.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Bodega</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->id }}</td>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>{{ $usuario->rol->nombre }}</td>
                            <td>{{ $usuario->bodega->nombre ?? 'Sin asignar' }}</td>
                            <td class="d-flex gap-2">
                                <a href="{{ route('usuarios.edit', $usuario) }}" class="btn btn-sm btn-warning">
                                    <i data-lucide="edit"></i> Editar
                                </a>
                                <form action="{{ route('usuarios.destroy', $usuario) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este usuario?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i data-lucide="trash-2"></i> Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection

@section('scripts')
<script>
    lucide.createIcons();
</script>
@endsection
