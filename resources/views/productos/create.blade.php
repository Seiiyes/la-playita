@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-4">➕ Agregar Nuevo Producto</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>⚠️ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('productos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nombre_producto" class="form-label">Nombre del producto</label>
            <input type="text" name="nombre_producto" id="nombre_producto" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label for="precio_unitario" class="form-label">Precio</label>
            <input type="number" step="0.01" name="precio_unitario" id="precio_unitario" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="IVA" class="form-label">IVA (%)</label>
            <input type="number" step="0.01" name="IVA" id="IVA" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="cantidad_stock" class="form-label">Cantidad en stock</label>
            <input type="number" name="cantidad_stock" id="cantidad_stock" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="fcaducidad" class="form-label">Fecha de caducidad</label>
            <input type="date" name="fcaducidad" id="fcaducidad" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="fk_id_categoria" class="form-label">Categoría</label>
            <select name="fk_id_categoria" id="fk_id_categoria" class="form-control" required>
                <option value="">Seleccione una categoría</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->pk_id_categoria }}">{{ $categoria->categoria }}</option>
                @endforeach
            </select>
        </div>

        <div class="d-flex justify-content-end">
            <a href="{{ route('productos.index') }}" class="btn btn-secondary me-2">Cancelar</a>
            <button type="submit" class="btn btn-success">Guardar</button>
        </div>
    </form>
</div>
@endsection
