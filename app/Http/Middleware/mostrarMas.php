<?php

namespace App\Http\Middleware;

use Closure;

class mostrarMas
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
      $usuarioLogeado = Auth::user();
      
        return $next($request);
    }
}
