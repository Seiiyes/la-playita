@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">📝 Registro de Usuario</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>⚠️ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="p_nombre_u" class="form-label">Primer Nombre</label>
                <input type="text" name="p_nombre_u" id="p_nombre_u" class="form-control" required value="{{ old('p_nombre_u') }}">
            </div>

            <div class="col-md-6 mb-3">
                <label for="s_nombre_u" class="form-label">Segundo Nombre</label>
                <input type="text" name="s_nombre_u" id="s_nombre_u" class="form-control" value="{{ old('s_nombre_u') }}">
            </div>

            <div class="col-md-6 mb-3">
                <label for="p_apellido_u" class="form-label">Primer Apellido</label>
                <input type="text" name="p_apellido_u" id="p_apellido_u" class="form-control" required value="{{ old('p_apellido_u') }}">
            </div>

            <div class="col-md-6 mb-3">
                <label for="s_apellido_u" class="form-label">Segundo Apellido</label>
                <input type="text" name="s_apellido_u" id="s_apellido_u" class="form-control" value="{{ old('s_apellido_u') }}">
            </div>

            <div class="col-12 mb-3">
                <label for="correo_u" class="form-label">Correo Electrónico</label>
                <input type="email" name="correo_u" id="correo_u" class="form-control" required value="{{ old('correo_u') }}">
            </div>

            <div class="col-md-6 mb-3">
                <label for="contrasena" class="form-label">Contraseña</label>
                <div class="input-group">
                    <input type="password" name="contrasena" id="contrasena" class="form-control" required>
                    <button type="button" class="btn btn-outline-secondary" id="togglePassword">👁️</button>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <label for="contrasena_confirmation" class="form-label">Confirmar Contraseña</label>
                <div class="input-group">
                    <input type="password" name="contrasena_confirmation" id="contrasena_confirmation" class="form-control" required>
                    <button type="button" class="btn btn-outline-secondary" id="togglePasswordConfirm">👁️</button>
                </div>
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
