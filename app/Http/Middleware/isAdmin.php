<?php

namespace App\Http\Middleware;
//Agregamos Auth porque usamos sus clases para validar.
use Auth;

use Closure;

class isAdmin
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
        //Este Middleware se fija si el user es admin, sino, redirije al home.
        if (Auth::user() &&  Auth::user()->is_admin == 1) {
            return $next($request);
        }

        return redirect('/');
    }
}
