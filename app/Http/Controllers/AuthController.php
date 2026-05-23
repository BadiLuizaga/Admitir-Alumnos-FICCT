<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Muestra el formulario de inicio de sesión.
     */
    public function showLogin()
    {
        // Si el usuario ya está autenticado en la sesión simulada, redirigir al dashboard
        if (session()->has('authenticated')) {
            return redirect()->route('dashboard');
        }

        return view('auth.login');
    }

    /**
     * Procesa la petición de inicio de sesión de forma simulada.
     */
    public function login(Request $request)
    {
        // Validación básica de campos vacíos
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4',
        ], [
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Por favor ingrese un correo electrónico válido.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 4 caracteres.',
        ]);

        // Simulación: si los campos son válidos y contienen datos, consideramos la sesión iniciada.
        // En una app real, aquí se verificarían las credenciales contra PostgreSQL
        session([
            'authenticated' => true,
            'user_email' => $request->input('email'),
            'user_name' => explode('@', $request->input('email'))[0], // Nombre simulado basado en el correo
            'login_time' => now()->toDateTimeString(),
        ]);

        return redirect()->route('dashboard')->with('success', 'Sesión iniciada correctamente de forma simulada.');
    }

    /**
     * Destruye la sesión simulada y redirige al Login.
     */
    public function logout()
    {
        // Limpiamos las variables simuladas de sesión
        session()->forget(['authenticated', 'user_email', 'user_name', 'login_time']);
        
        // También podemos invalidar la sesión completa
        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('login')->with('info', 'Has cerrado sesión correctamente del Sistema de Admisión CUP.');
    }
}
