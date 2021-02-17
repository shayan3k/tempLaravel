<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class admin
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
       if(Auth::check())
       {
        if(Auth::user()->role=='admin')
        {
            return $next($request);
        }
       else
       {
           return redirect('/');
       }
       }
       else
       {
        return redirect('/');
       }
    }
}
