<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;


class LoginController extends Controller
{
    public function formularioLogin()
    {
        if (Auth::check()) {
            return redirect()->route('backoffice.dashboard');
        }
        return view('usuario.login');
    }

    public function formularioUsuario()
    {
        if (Auth::check()) {
            return redirect()->route('backoffice.dashboard');
        }
        return view('usuario.create');
    }

    public function login(Request $_request)
    {
        $mensajes = [
            'email.required' => 'El correo es obligatorio.',
            'email.email' => 'El correo no tiene un formato valido',
            'password.required' => 'La contraseña es obligatoria'
        ];

        $_request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], $mensajes);

        $credenciales = $_request->only('email', 'password');

        if (Auth::attempt($credenciales)) {

            $user = Auth::user();
            if (!$user->activo) {
                Auth::logout();
                return redirect()->route('usuario.login')->withError(['email' => 'El usuario se encuentra desactivado']);
            }

            $_request->session()->regenerate();
            return redirect()->route('backoffice.dashboard');
        }
        return redirect()->back()->withErrors(['email' => 'El usuario o contraseña son incorrectos.']);
    }

    public function registrar(Request $_request)
    {
        $mensajes = [
            'nombre.required' => 'El nombre es obligatorio.',
            'email.required' => 'El correo es obligatorio.',
            'email.email' => 'El correo no tiene un formato valido',
            'password.required' => 'La contraseña es obligatoria.',
            'rePassword.required' => 'Repetir la contraseña es obligatorio.',
            'dayCode.required' => 'El codigo del dia es obligatorio.'
        ];

        $_request->validate([
            'nombre' => 'required|string|max:50',
            'email' => 'required|email',
            'password' => 'required',
            'rePassword' => 'required',
            'dayCode' => 'required',
        ], $mensajes);

        $datos = $_request->only('nombre', 'email', 'password', 'rePassword', 'dayCode');
        if ($datos['password'] != $datos['rePassword']) {
            return back()->withErrors(['message' => 'Las contraseñas no coinciden.']);
        }

        // Codigo del dia 

        date_default_timezone_set('UTC');
        if ($datos['dayCode'] != date("d")) {
            return back()->withErrors(['message' => ' El código del día es incorrecto.']);
        }
        try {
            User::create([
                'nombre' => $datos['nombre'],
                'email' => $datos['email'],
                'password' => Hash::make($datos['password'])
            ]);
            return redirect()->route('usuario.login')->with('success', 'Usuario creado exitosamente :)');
        } catch (Exception $e) {
            return back()->withErrors(['message' => 'Error: ' . $e->getMessage()]);
        }
    }
    public function logout(Request $_request)
    {
        Auth::logout();
        $_request->session()->invalidate();
        $_request->session()->regenerateToken();
        return redirect()->route('usuario.login');
    }
}
