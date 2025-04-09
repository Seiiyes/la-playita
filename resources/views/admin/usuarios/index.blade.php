@extends('layouts.app')

@section('content')
<!-- Agrega Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<style>
    .card-blur {
        background-color: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border-radius: 20px;
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
    }

    .badge-admin {
        background-color: #0d6efd;
    }

    .badge-vendedor {
        background-color: #6c757d;
    }

    /* Estilo para mostrar el texto de los botones deshabilitados */
    .btn[disabled] {
        color: #0d6efd !important;
        opacity: 0.8 !important;
    }
</style>

<div class="container mt-5">
    <div class="card card-blur border-0 p-4 text-white">
        <h2 class="text-center mb-4">
            <i class="bi bi-people-fill"></i> Gestión de Usuarios
        </h2>

        @if (session('success'))
            <div class="alert alert-success text-dark">{{ session('success') }}</div>
        @endif

        <!-- Estadísticas -->
        <div class="mb-3 d-flex justify-content-center gap-3">
            <span class="badge bg-primary">Admins: {{ $usuarios->where('fk_id_roles', 1)->count() }}</span>
            <span class="badge bg-secondary">Vendedores: {{ $usuarios->where('fk_id_roles', 2)->count() }}</span>
        </div>

        <table class="table table-hover table-bordered text-dark bg-white rounded">
            <thead class="table-dark text-center">
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Rol Actual</th>
                    <th>Cambiar Rol</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr class="align-middle text-center">
                        <td>{{ $usuario->p_nombre_u }} {{ $usuario->p_apellido_u }}</td>
                        <td>{{ $usuario->correo_u }}</td>
                        <td>
                            <span class="badge {{ $usuario->fk_id_roles == 1 ? 'badge-admin' : 'badge-vendedor' }}">
                                {{ $usuario->rol->desc_rol ?? 'Sin rol' }}
                            </span>
                        </td>
                        <td>
                            <form action="{{ route('admin.usuarios.actualizarRol', $usuario->pk_id_usuario) }}" method="POST" class="d-flex justify-content-center align-items-center gap-2">
                                @csrf
                                <select name="fk_id_roles" class="form-select form-select-sm w-auto" onchange="this.nextElementSibling.disabled = false;">
                                    @foreach($roles as $rol)
                                        <option value="{{ $rol->pk_id_roles }}" {{ $usuario->fk_id_roles == $rol->pk_id_roles ? 'selected' : '' }}>
                                            {{ $rol->desc_rol }}
                                        </option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-outline-primary btn-sm" disabled>
                                    <i class="bi bi-arrow-repeat"></i> Actualizar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
