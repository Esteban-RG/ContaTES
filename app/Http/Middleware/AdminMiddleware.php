<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        // Verificar si el usuario está autenticado
        if (!Auth::check()) {
            return redirect()->route('login'); 
        }

        // Verificar el rol del usuario autenticado
        if (Auth::user()->role == 'admin') {
            return $next($request);
        }

        return redirect()->route("home");

       
    }
}