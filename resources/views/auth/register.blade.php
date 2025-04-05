@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Registro</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-3">
            <label>Primer Nombre</label>
            <input type="text" name="p_nombre_u" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Segundo Nombre</label>
            <input type="text" name="s_nombre_u" class="form-control">
        </div>

        <div class="mb-3">
            <label>Primer Apellido</label>
            <input type="text" name="p_apellido_u" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Segundo Apellido</label>
            <input type="text" name="s_apellido_u" class="form-control">
        </div>

        <div class="mb-3">
            <label>Correo</label>
            <input type="email" name="correo_u" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Contraseña</label>
            <input type="password" name="contrasena" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Confirmar Contraseña</label>
            <input type="password" name="contrasena_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Registrarse</button>
    </form>
</div>
@endsection
