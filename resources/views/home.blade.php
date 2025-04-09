@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
<style>
    .btn-home {
        padding: 15px 25px;
        font-size: 16px;
        font-weight: 600;
        border-radius: 10px;
        transition: 0.3s ease-in-out;
    }

    .btn-home:hover {
        transform: scale(1.05);
    }

    .welcome-section {
        margin-top: 100px;
    }

    .welcome-title {
        font-size: 3rem;
        font-weight: 700;
        color: #fff;
    }

    .welcome-highlight {
        color: #ffffff;
    }
</style>

<div class="container text-center welcome-section">
    <h2 class="welcome-title">
        Bienvenido a 
        <span class="welcome-highlight">La Playita</span>
        <img src="{{ asset('images/la-playita-logo.png') }}" alt="Logo" width="150" class="ms-1 align-middle rounded-circle shadow border border-dark">
    </h2>

    @auth
        <div class="d-flex flex-wrap justify-content-center gap-3 mt-4">
            <a href="{{ route('productos.index') }}" class="btn btn-outline-primary btn-home">
                📦 Gestionar Productos
            </a>
            <a href="{{ route('categorias.index') }}" class="btn btn-outline-success btn-home">
                📁 Gestionar Categorías
            </a>

            @if(Auth::user()->fk_id_roles == 1)
                <a href="{{ route('admin.usuarios.index') }}" class="btn btn-outline-warning btn-home">
                    👥 Gestionar Roles de Usuario
                </a>
            @endif
        </div>
    @endauth
</div>
@endsection
