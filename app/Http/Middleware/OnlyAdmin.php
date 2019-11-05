<?php

namespace App\Http\Middleware;

use Closure;

class OnlyAdmin
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
        // return $next($request);

        if(Auth::check()) {
            
            if(Auth::user()->isAdmin()) {
                return $next($request);
            }
        }

        return redirect('/');

    }
}
