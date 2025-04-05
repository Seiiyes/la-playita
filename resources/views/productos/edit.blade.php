@extends('layouts.app')

@section('content')


    <h1 class="mt-4">Editar Producto</h1>

<form action="{{ route('productos.update', $producto) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group mb-3">
        <label for="nombre_producto">Nombre</label>
        <input type="text" name="nombre_producto" class="form-control" value="{{ $producto->nombre_producto }}">
    </div>

    <div class="form-group mb-3">
        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" class="form-control">{{ $producto->descripcion }}</textarea>
    </div>

    <div class="form-group mb-3">
        <label for="precio_unitario">Precio Unitario</label>
        <input type="number" step="0.01" name="precio_unitario" class="form-control" value="{{ $producto->precio_unitario }}">
    </div>

    <div class="form-group mb-3">
        <label for="IVA">IVA (%)</label>
        <input type="number" step="0.01" name="IVA" class="form-control" value="{{ $producto->IVA }}">
    </div>

    <div class="form-group mb-3">
        <label for="cantidad_stock">Cantidad en Stock</label>
        <input type="number" name="cantidad_stock" class="form-control" value="{{ $producto->cantidad_stock }}">
    </div>

    <div class="form-group mb-3">
        <label for="fcaducidad">Fecha de Caducidad</label>
        <input type="date" name="fcaducidad" class="form-control" value="{{ $producto->fcaducidad }}">
    </div>

    <div class="mb-3">
    <label for="fk_id_categoria" class="form-label">Categoría</label>
    <select name="fk_id_categoria" id="fk_id_categoria" class="form-control" required>
        <option value="">Seleccione una categoría</option>
        @foreach($categorias as $categoria)
          <option value="{{ $categoria->pk_id_categoria }}"
            {{ $producto->fk_id_categoria == $categoria->pk_id_categoria ? 'selected' : '' }}>
            {{ $categoria->categoria }}
            </option>

        @endforeach
    </select>
    </div>




    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
    </div>
</form>

@endsection
