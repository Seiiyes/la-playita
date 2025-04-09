<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index(Request $request)
{
    $search = $request->input('search');

    $categorias = Categoria::when($search, function ($query, $search) {
        return $query->where('categoria', 'LIKE', "%{$search}%");
    })->paginate(5);

    return view('categorias.index', compact('categorias'));
}

    public function create()
    {
        $categorias = Categoria::all();
        return view('categorias.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pk_id_categoria' => 'required|integer|unique:tbl_categorias,pk_id_categoria',
            'categoria' => 'required|string|max:25',
        ], [
            'pk_id_categoria.required' => 'El campo ID de categoría es obligatorio.',
            'pk_id_categoria.integer' => 'El ID de categoría debe ser un número entero.',
            'pk_id_categoria.unique' => '⚠️ Ya existe una categoría con ese ID.',
            'categoria.required' => 'El nombre de la categoría es obligatorio.',
            'categoria.max' => 'El nombre de la categoría no puede tener más de 25 caracteres.',
        ]);

        Categoria::create([
            'pk_id_categoria' => $request->pk_id_categoria,
            'categoria' => $request->categoria,
        ]);

        return redirect()->route('categorias.index')->with('success', '¡Categoría agregada correctamente!');
    }

    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'categoria' => 'required|string|max:25',
        ], [
            'categoria.required' => 'El nombre de la categoría es obligatorio.',
            'categoria.max' => 'El nombre de la categoría no puede tener más de 25 caracteres.',
        ]);

        $categoria = Categoria::findOrFail($id);
        $categoria->update([
            'categoria' => $request->categoria
        ]);

        return redirect()->route('categorias.index')->with('success', '¡Categoría actualizada!');
    }

    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada');
    }
}
