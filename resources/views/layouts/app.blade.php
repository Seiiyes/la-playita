<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'La Playita')</title>

    {{-- Bootstrap y FontAwesome --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        body {
            background-image: url('{{ asset('images/fondo.jpeg') }}');
            background-size: cover; 
            background-position: center; 
            background-repeat: no-repeat; 
            background-attachment: fixed;
            font-family: 'Arial', sans-serif;
        }

        .navbar-brand img {
            transition: transform 0.3s ease;
        }

        .navbar-brand:hover img {
            transform: scale(1.1);
        }

        .form-label,
        .form-control,
        .btn,
        .table,
        h1, h2, h3, h4, h5, h6,
        p, li {
            color: #f8f9fa !important; /* Texto claro */
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid #ccc;
        }

        .form-control::placeholder {
            color: #e0e0e0;
        }

        .card {
            background-color: rgba(0, 0, 0, 0.6);
            color: #f8f9fa;
        }

        .btn {
            color: white;
        }

        .btn:hover {
            opacity: 0.9;
        }

        input,
        textarea,
        select {
            background-color: rgba(0, 0, 0, 0.6) !important;
            color: #fff !important;
            border: 1px solid #ccc !important;
        }

        input::placeholder,
        textarea::placeholder {
            color: #ccc !important;
        }

        input:focus,
        textarea:focus,
        select:focus {
            background-color: rgba(0, 0, 0, 0.8) !important;
            color: #fff !important;
            outline: none !important;
            box-shadow: 0 0 5px #fdd835 !important;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
            <img src="{{ asset('images/la-playita-logo.png') }}" alt="Logo de La Playita" width="50" height="50" class="me-2 rounded-circle shadow border border-white">
            <span class="fw-bold text-white fs-5">La Playita</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ms-auto gap-2">
                @guest
                    <li class="nav-item">
                        <a class="btn btn-outline-light" href="{{ route('login') }}">
                            Iniciar Sesión
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-warning text-dark" href="{{ route('register') }}">
                            Registro
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <span class="nav-link text-white">
                            👤 {{ Auth::user()->p_nombre_u }} {{ Auth::user()->p_apellido_u }}
                        </span>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-outline-light">🚪 Cerrar Sesión</button>
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
