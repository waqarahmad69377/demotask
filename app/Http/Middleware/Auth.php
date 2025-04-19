<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth as CheckAuth;

class Auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // Check if the user is authenticated
        if (!CheckAuth::check()) {
            // Redirect to the login page if not authenticated
            return redirect()->route('login');
        }
        // Optionally, you can check for specific roles or permissions here
        // For example, if you want to check if the user is an admin:

        return $next($request);
    }
}
