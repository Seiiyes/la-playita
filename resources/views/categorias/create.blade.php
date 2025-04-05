@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-4">📂 Agregar Nueva Categoría</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>⚠️ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="categoria" class="form-label">Nombre de la Categoría</label>
            <input type="text" name="categoria" id="categoria" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción (opcional)</label>
            <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
        </div>

        <div class="d-flex justify-content-end">
            <a href="{{ route('productos.index') }}" class="btn btn-secondary me-2">Cancelar</a>
            <button type="submit" class="btn btn-success">Guardar</button>
        </div>
    </form>
</div>
@endsection
