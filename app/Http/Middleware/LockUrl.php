<?php

namespace App\Http\Middleware;

use Closure;

class LockUrl
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
        if (auth()->guest())
        {
            flash('veuillez vous connectez svp ou créer vous un compte !!','danger');

            return  redirect('/login');
        }
        return $next($request);
    }
}
