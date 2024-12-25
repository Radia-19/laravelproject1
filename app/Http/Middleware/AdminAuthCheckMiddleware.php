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
            Log::info('Admin is logged in');
            //dd(session()->all());

            return $next($request);
            //dd('Admin middleware is working: Admin is not logged in');
        }else{
            Log::info('Admin is NOT logged in');
            return redirect()->route('admin.login.show');
        }
    }


    // public function handle($request, Closure $next)
    // {
    //     dd(app('router')->getMiddleware());
    //     return $next($request);
    // }

}
