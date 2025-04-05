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
            <div class="input-group">
                <input type="password" name="contrasena" id="contrasena" class="form-control" required>
                <button type="button" class="btn btn-outline-secondary" id="togglePassword">👁️</button>
            </div>
        </div>

        <div class="mb-3">
            <label>Confirmar Contraseña</label>
            <div class="input-group">
                <input type="password" name="contrasena_confirmation" id="contrasena_confirmation" class="form-control" required>
                <button type="button" class="btn btn-outline-secondary" id="togglePasswordConfirm">👁️</button>
            </div>
        </div>

        <div class="d-flex justify-content-end gap-2">
            <a href="{{ url('/login') }}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Registrarse</button>
        </div>
    </form>
</div>

<script>
    document.getElementById('togglePassword').addEventListener('click', function () {
        const input = document.getElementById('contrasena');
        input.type = input.type === 'password' ? 'text' : 'password';
        this.textContent = input.type === 'password' ? '👁️' : '🙈';
    });

    document.getElementById('togglePasswordConfirm').addEventListener('click', function () {
        const input = document.getElementById('contrasena_confirmation');
        input.type = input.type === 'password' ? 'text' : 'password';
        this.textContent = input.type === 'password' ? '👁️' : '🙈';
    });
</script>
@endsection
