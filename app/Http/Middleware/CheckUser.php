<?php

namespace App\Http\Middleware;

use Closure;
use Auth; 
class CheckUser
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
        if(Auth::user()->statut !='active'){
            Auth::logout();
            return redirect('/');
        }
        return $next($request);
    }
}
