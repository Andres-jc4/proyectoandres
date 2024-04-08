@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mb-4">Usuarios</h1>
        <a href="{{ route('users.create') }}" class="btn btn-success"><i class="fas fa-user-plus"></i> Añadir Usuario</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Usuario</th>
                    <th>Rol</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->rol_descripcion }}</td>
                    <td>{{ $user->usu_nombre }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Acciones">
                            <a href="{{ route('users.edit', $user->usu_id) }}" class="btn btn-sm btn-info" title="Editar"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('users.destroy', $user->usu_id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este usuario?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">No hay usuarios disponibles.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
