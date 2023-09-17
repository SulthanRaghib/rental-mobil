<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MultipleRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (auth()->check() && in_array(auth()->user()->role_id, $roles)) {
            return $next($request);
        }
    
        return abort(403); // User does not have the required role(s); return a 403 Forbidden response.
    }
    
}
