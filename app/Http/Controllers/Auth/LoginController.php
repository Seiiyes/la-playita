<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validar los campos
        $credentials = $request->validate([
            'correo_u' => ['required', 'email'],
            'contrasena' => ['required'],
        ]);

        // Intentar autenticación
        if (Auth::attempt([
            'correo_u' => $credentials['correo_u'],
            'password' => $credentials['contrasena']
        ])) {
            $request->session()->regenerate();
            return redirect()->intended('/'); // Redirigir al home o dashboard
        }

        // Si falla
        return back()->withErrors([
            'correo_u' => 'Las credenciales no coinciden.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
