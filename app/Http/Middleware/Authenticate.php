<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Authenticate
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
     public function handle($request, Closure $next, $guard = null)
         {

             // si la persona no inició sesión, entonces ....
             if (Auth::guard($guard)->guest()) {

                 if ($request->ajax()) {

                     return route('login');

                 } else {

                     // si la persona no inició sesión y no es una solicitud ajax
                     // enviar al formulario de ingreso
                      return redirect()->route('login');

                 }
             }

             return $next($request);
           }
}
