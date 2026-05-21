<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureAuthenticated
{
    public function handle(Request $request, Closure $next, string $guard = null): Response
    {
        if ($guard) {
            Auth::shouldUse($guard);

            if (!Auth::guard($guard)->check()) {
                return redirect()->route($guard === 'bem' ? 'login-bem' : 'login-staff');
            }

            return $next($request);
        }

        if (Auth::check()) {
            return $next($request);
        }

        if (Auth::guard('staff')->check()) {
            Auth::shouldUse('staff');
            return $next($request);
        }

        if (Auth::guard('bem')->check()) {
            Auth::shouldUse('bem');
            return $next($request);
        }

        return redirect()->route('login-user');
    }
}
