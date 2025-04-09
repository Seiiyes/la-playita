<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistroController extends Controller
{
    public function showRegistrationForm()
    {
        if (Auth::check()) {
            return redirect()->route('home'); // Redirigir si ya está logueado
        }

        $roles = Rol::all(); 
        return view('auth.register', compact('roles'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'p_nombre_u' => 'required|string|max:25',
            'p_apellido_u' => 'required|string|max:25',
            'correo_u' => 'required|email|unique:tbl_usuario,correo_u',
            'contrasena' => 'required|string|min:6|confirmed',
            'fk_id_roles' => 'required|exists:tbl_roles,pk_id_roles',
        ]);

        $usuario = Usuario::create([
            'p_nombre_u' => $request->p_nombre_u,
            's_nombre_u' => $request->s_nombre_u,
            'p_apellido_u' => $request->p_apellido_u,
            's_apellido_u' => $request->s_apellido_u,
            'correo_u' => $request->correo_u,
            'contrasena' => bcrypt($request->contrasena),
            'estado_usuario' => 1,
            'fk_id_roles' => $request->fk_id_roles,
        ]);

        Auth::login($usuario);

        return redirect()->route('home');
    }
}
