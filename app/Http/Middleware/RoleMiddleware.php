<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    // Define los roles permitidos en la aplicación
    private const ALLOWED_ROLES = [1, 2, 3];

    /**
     * Maneja la solicitud entrante.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  mixed  ...$roles
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Verifica si el usuario está autenticado
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirige al inicio de sesión si no está autenticado
        }

        // Obtiene el rol del usuario autenticado
        $userRole = Auth::user()->role;

        // Verifica si el rol está dentro de los roles globalmente permitidos
        if (!in_array($userRole, self::ALLOWED_ROLES)) {
            return abort(403, 'Acceso denegado: Rol no permitido'); // Devuelve un error si el rol no es válido
        }

        // Verifica si el rol del usuario está dentro de los roles permitidos para esta ruta
        if (!empty($roles) && !in_array($userRole, $roles)) {
            return abort(403, 'Acceso denegado'); // Devuelve un error si no tiene acceso a la ruta
        }

        return $next($request); // Permite el acceso si todo es válido
    }
}
