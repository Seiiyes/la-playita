@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-warning">Editar Categoría</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>⚠️ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categorias.update', $categoria->pk_id_categoria) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="categoria" class="form-label">Nombre Categoría</label>
            <input type="text" class="form-control" name="categoria" value="{{ old('categoria', $categoria->categoria) }}" maxlength="25" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
