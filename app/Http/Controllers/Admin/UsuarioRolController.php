<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Models\Rol;
use Illuminate\Http\Request;

class UsuarioRolController  extends Controller
{
    public function index()
    {
        $usuarios = Usuario::with('rol')->get();
        $roles = Rol::all();

        return view('admin.usuarios.index', compact('usuarios', 'roles'));
    }

    public function actualizarRol(Request $request, $id)
    {
        $request->validate([
            'fk_id_roles' => 'required|exists:tbl_rol,pk_id_roles',
        ]);

        $usuario = Usuario::findOrFail($id);
        $usuario->fk_id_roles = $request->fk_id_roles;
        $usuario->save();

        return redirect()->back()->with('success', 'Rol actualizado correctamente');
    }
}