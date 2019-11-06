<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

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

        return redirect('/books');
        // return response('Not allowed!');


        // if (Auth::user() &&  Auth::user()->admin == 1) {
        //     return $next($request);
        // }

        // return redirect('/');

    }
}
