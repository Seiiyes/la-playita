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

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <form action="{{ route('productos.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="nombre_producto" class="form-label">Nombre del producto</label>
                    <input type="text" name="nombre_producto" id="nombre_producto"
                           class="form-control @error('nombre_producto') is-invalid @enderror"
                           value="{{ old('nombre_producto') }}" required>
                    @error('nombre_producto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea name="descripcion" id="descripcion"
                              class="form-control @error('descripcion') is-invalid @enderror"
                              rows="3">{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="precio_unitario" class="form-label">Precio</label>
                        <input type="number" step="0.01" name="precio_unitario" id="precio_unitario"
                               class="form-control @error('precio_unitario') is-invalid @enderror"
                               value="{{ old('precio_unitario') }}" required>
                        @error('precio_unitario')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="IVA" class="form-label">IVA (%)</label>
                        <input type="number" step="0.01" name="IVA" id="IVA"
                               class="form-control @error('IVA') is-invalid @enderror"
                               value="{{ old('IVA') }}" required>
                        @error('IVA')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="cantidad_stock" class="form-label">Cantidad en stock</label>
                        <input type="number" name="cantidad_stock" id="cantidad_stock"
                               class="form-control @error('cantidad_stock') is-invalid @enderror"
                               value="{{ old('cantidad_stock') }}" required>
                        @error('cantidad_stock')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="fcaducidad" class="form-label">Fecha de caducidad</label>
                        <input type="date" name="fcaducidad" id="fcaducidad"
                               class="form-control @error('fcaducidad') is-invalid @enderror"
                               value="{{ old('fcaducidad') }}" required>
                        @error('fcaducidad')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label for="fk_id_categoria" class="form-label">Categoría</label>
                    <select name="fk_id_categoria" id="fk_id_categoria"
                            class="form-select @error('fk_id_categoria') is-invalid @enderror"
                            required>
                        <option value="">Seleccione una categoría</option>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->pk_id_categoria }}"
                                {{ old('fk_id_categoria') == $categoria->pk_id_categoria ? 'selected' : '' }}>
                                {{ $categoria->categoria }}
                            </option>
                        @endforeach
                    </select>
                    @error('fk_id_categoria')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('productos.index') }}" class="btn btn-secondary me-2">Cancelar</a>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
