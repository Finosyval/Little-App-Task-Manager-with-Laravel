<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user() && auth()->user()->role === 'Admin') {
            return $next($request);
        }
       // Redirige ou retourne un statut HTTP d'interdiction
       return response()->json(['error' => 'Accès interdit.'], Response::HTTP_FORBIDDEN);
    }
}
