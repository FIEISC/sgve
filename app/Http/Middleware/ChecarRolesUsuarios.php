<?php

namespace sgve\Http\Middleware;

use Closure;

use Auth;

class ChecarRolesUsuarios
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
     
       $roles = array_slice(func_get_args(), 2);

       if (Auth::user()->hasRoles($roles)) 
       {
           return $next($request);
       }

        return redirect()->route('home');
    }
}
