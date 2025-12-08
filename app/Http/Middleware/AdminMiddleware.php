<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Controleer of gebruiker is ingelogd en admin is
        if (!auth()->check() || auth()->user()->is_admin !== true) {
            abort(403, 'Toegang geweigerd.');
        }

        return $next($request);
    }
}
