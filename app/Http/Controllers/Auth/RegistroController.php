<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegistroController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'p_nombre_u' => 'required|string|max:25',
            'p_apellido_u' => 'required|string|max:25',
            'correo_u' => 'required|email|unique:tbl_usuario,correo_u',
            'contrasena' => 'required|string|min:6|confirmed',
        ]);

        $usuario = Usuario::create([
            'p_nombre_u' => $request->p_nombre_u,
            's_nombre_u' => $request->s_nombre_u,
            'p_apellido_u' => $request->p_apellido_u,
            's_apellido_u' => $request->s_apellido_u,
            'correo_u' => $request->correo_u,
            'contrasena' => bcrypt($request->contrasena),
            'estado_usuario' => 1,
            'fk_id_roles' => 2, // Puedes asignar el rol predeterminado aquí
        ]);

        Auth::login($usuario);

        return redirect()->route('home');
    }
}
