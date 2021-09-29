<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{
    public function handle($request, Closure $next)
    {
        if (auth()->check()) {

            if (auth()->user()->hasRole('Admin')) {

                return $next($request);
            } else {

                abort('401');
            }
        } else {

            return redirect('/');
        }
    }
}
