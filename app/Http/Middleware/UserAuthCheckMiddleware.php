<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserAuthCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Log::info('UserAuthCheckMiddleware executed for route: ' . $request->path());
        if(Auth::check()){
            return $next($request);
        }else{
            Log::warning('Unauthenticated access attempt to: ' . $request->path());
            return to_route('user.login.show')->with('errMsg','You Must Login First!');
        }

    }
}
