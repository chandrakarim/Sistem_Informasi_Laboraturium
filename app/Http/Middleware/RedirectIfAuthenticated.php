<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // if (Auth::guard($guard)->check()) {
        //     return redirect(RouteServiceProvider::HOME);
        // }
        if (Auth::guard('admin')->check()) {
            return redirect('/dashboard/admin');
        }elseif (Auth::guard('dosen')->check()) {
            return redirect('/dashboard/dosen');
        }elseif (Auth::guard('mahasiswa')->check()) {
            return redirect('/dashboard/mahasiswa');
        }
        return $next($request);
    }
}
