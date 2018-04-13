<?php

namespace App\Http\Middleware;

use Closure;

class LoggedInMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!(auth('mahasiswa')->check() OR auth('pegawai')->check())){
            return redirect()->route('login');
        }

        return $next($request);
    }
}
