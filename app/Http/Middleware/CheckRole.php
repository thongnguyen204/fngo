<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role)
    {
        if(Auth::user()->role->name != $role)
        {
            return redirect()->route('home');
        }
        return $next($request);
    }
}
