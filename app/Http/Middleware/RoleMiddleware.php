<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        if (auth()->check() && auth()->user()->role_id == $role) {
            return $next($request); // User has the required role; proceed to the next middleware.
        }
    
        return abort(403); // User does not have the required role; return a 403 Forbidden response.
    }
    
}
