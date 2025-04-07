@extends('layouts.app')

@section('content')
<div class="container mt-5" style="max-width: 500px;">
    <h2 class="mb-4 text-center">Iniciar Sesión</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>⚠️ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label for="correo_u" class="form-label">Correo electrónico</label>
            <input type="email" name="correo_u" id="correo_u" class="form-control" required autofocus>
        </div>

    <div class="mb-3">
    <label for="contrasena" class="form-label">Contraseña</label>
    <div class="input-group">
        <input type="password" name="contrasena" id="contrasena" class="form-control" required>
        <button type="button" class="btn btn-outline-secondary" id="togglePassword">
            👁️
        </button>
    </div>
    </div>
        <button type="submit" class="btn btn-primary w-100">Ingresar</button>
    </form>
</div>
    <script>
    document.getElementById('togglePassword').addEventListener('click', function () {
        const passwordInput = document.getElementById('contrasena');
        const isPassword = passwordInput.getAttribute('type') === 'password';
        passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
        this.textContent = isPassword ? '🙈 Ocultar' : '👁️ Mostrar';

    });
    </script>

@endsection
