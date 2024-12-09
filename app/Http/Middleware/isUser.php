<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user() && auth()->user()->role === 'User') {
            return $next($request);
        }
          // Redirige ou retourne un statut HTTP d'interdiction
          return response()->json(['error' => 'Accès interdit.'], Response::HTTP_FORBIDDEN);
    }
}
