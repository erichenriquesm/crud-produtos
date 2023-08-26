<?php

namespace App\Http\Middleware;

use Closure;

class TesteMiddleware
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
        if(!$request->header('Authorization') || $request->header('Authorization') != "123"){
            abort(401);
        }

        return $next($request);
    }
}
