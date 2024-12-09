<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
class AuthenticateWithWarning
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            // Vérifiez si c'est une requête GET (ex. : formulaire)
            if ($request->isMethod('post')) {
                session()->flash('warning', 'Vous devez d\'abord vous authentifier. Créez un compte ou connectez-vous.');
                    return redirect()->back();
            }

            // Pour les autres requêtes (POST, etc.), redirigez vers login
            return redirect()->route('home')->with('warning', 'Vous devez être connecté pour effectuer cette action.');
        }

        return $next($request);
    }
    }

