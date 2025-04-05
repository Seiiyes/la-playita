@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1 class="mb-4">Bienvenido a La Playlita 🛍️</h1>

    <div class="row justify-content-center">
        <div class="col-md-4 mb-3">
            <a href="{{ route('productos.index') }}" class="btn btn-outline-primary w-100 py-3">
                📦 Gestionar Productos
            </a>
        </div>
        <div class="col-md-4 mb-3">
            <a href="{{ route('categorias.index') }}" class="btn btn-outline-success w-100 py-3">
                🗂️ Gestionar Categorías
            </a>
        </div>
        <div class="col-md-4 mb-3">
            @guest
                <a href="{{ route('login') }}" class="btn btn-outline-dark w-100 py-3">
                    🔐 Iniciar Sesión
                </a>
            @else
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger w-100 py-3">🚪 Cerrar Sesión</button>
                </form>
            @endguest
        </div>
        @guest
        <div class="col-md-4 mb-3">
            <a href="{{ route('register') }}" class="btn btn-outline-secondary w-100 py-3">
                📝 Registrarse
            </a>
        </div>
        @endguest
    </div>
</div>
@endsection
