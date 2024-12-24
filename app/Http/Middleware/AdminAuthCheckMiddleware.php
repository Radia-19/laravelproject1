<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;



class AdminAuthCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::guard("admin")->check()) {
            Log::info('Admin authenticated: ' . Auth::guard('admin')->user()->id);
            return $next($request);
        }else{
            Log::warning('Unauthenticated admin access attempt: ' . $request->path());
            return redirect()->route('admin.login.show');
        }
    }
}
