<?php

namespace App\Http\Middleware;

use Closure;

class CheckStatus
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
        if ($request->user()->admin) {
            return $next($request);
        }
        
        return redirect('/')->with('message', 'No tienes permisos para acceder a esa ruta');
    }
}
