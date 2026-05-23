<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SimulatedAuth
{
    /**
     * Maneja una petición entrante.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verificar si la sesión simulada no está activa
        if (!session()->has('authenticated') || session('authenticated') !== true) {
            return redirect()->route('login')->with('error', 'Acceso denegado. Debe iniciar sesión en el Sistema de Admisión CUP.');
        }

        return $next($request);
    }
}
