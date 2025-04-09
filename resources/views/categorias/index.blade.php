@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary">Listado de Categorías</h2>
        <a href="{{ route('categorias.create') }}" class="btn btn-success">Agregar Categoría</a>
    </div>

    
    <form action="{{ route('categorias.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Buscar categoría..." value="{{ request('search') }}">
            <button class="btn btn-outline-primary" type="submit">Buscar</button>
        </div>
    </form>

   
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Categoría</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->pk_id_categoria }}</td>
                        <td>{{ $categoria->categoria }}</td>
                        <td>
                            <a href="{{ route('categorias.edit', $categoria->pk_id_categoria) }}" class="btn btn-sm btn-warning">Editar</a>

                            <form action="{{ route('categorias.destroy', $categoria->pk_id_categoria) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar esta categoría?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">No se encontraron categorías.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

   
    <div class="d-flex justify-content-center">
        {{ $categorias->appends(['search' => request('search')])->links() }}
    </div>
</div>
@endsection
