<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */


    public function handle(Request $request, Closure $next, $role): Response
    {
        $user = Auth::user();
        //si el usuario autenticado No tiene el tipo que le pedimo...
        if ($user->role !== $role) {
            //lo mandamos al inicio(o le das error 403)
            return redirect('/')->withErrors([
                'errors' => 'No tiene permisos'
            ]);
        }

        //si es correcto , le dejeamos pasar
        return $next($request);
    }
}
