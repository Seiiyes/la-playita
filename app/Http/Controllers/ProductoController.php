<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::paginate(10); // Cambia el número a lo que quieras
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('productos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_producto' => 'required',
            'descripcion' => 'nullable|string',
            'precio_unitario' => 'required|numeric',
            'IVA' => 'required|numeric',
            'cantidad_stock' => 'required|integer',
            'fcaducidad' => 'required|date',
            'fk_id_categoria' => 'required|exists:tbl_categorias,pk_id_categoria',
        ]);

        Producto::create($request->all());
        return redirect()->route('productos.index')->with('success', 'Producto creado con éxito');
    }

    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.show', compact('producto'));
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::all();
        

        return view('productos.edit', compact('producto', 'categorias'));
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre_producto' => 'required',
            'descripcion' => 'nullable|string',
            'precio_unitario' => 'required|numeric',
            'IVA' => 'required|numeric',
            'cantidad_stock' => 'required|integer',
            'fcaducidad' => 'required|date',
            'fk_id_categoria' => 'required|exists:tbl_categorias,pk_id_categoria',
        ]);
    
        $producto->update($request->all());
    
        return redirect()->route('productos.index')->with('success', 'Producto actualizado con éxito');
    }
    

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado con éxito');
    }
}
