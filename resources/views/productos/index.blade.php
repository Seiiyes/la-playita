@extends('layouts.app') 

@section('content')
<div class="container">
    <h1 class="text-center my-4">📦 Productos</h1>
    
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('productos.create') }}" class="btn btn-primary">➕ Agregar Producto</a>
        <a href="{{ route('categorias.create') }}" class="btn btn-primary">📂 Agregar Categoría</a>       
    </div>

    <!-- Barra de búsqueda -->
    <form action="{{ route('productos.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Buscar producto..." value="{{ request('search') }}">
            <button class="btn btn-outline-primary" type="submit">🔍 Buscar</button>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($productos as $producto)
                    <tr>
                        <td>{{ $producto->pk_id_producto }}</td>
                        <td>{{ $producto->nombre_producto }}</td>
                        <td>${{ number_format($producto->precio_unitario, 0, ',', '.') }}</td>
                        <td>{{ $producto->cantidad_stock }}</td>
                        <td class="text-center">
                            <a href="{{ route('productos.edit', $producto->pk_id_producto) }}" class="btn btn-warning btn-sm">🛠️ Editar</a>
                            <form action="{{ route('productos.destroy', $producto->pk_id_producto) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este producto?')">🗑️ Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No se encontraron productos.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $productos->appends(['search' => request('search')])->links() }}
    </div>
</div>
@endsection
