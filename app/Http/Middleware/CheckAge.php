<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // --Note: check is the name of the middleware
        // --Note: Is done as get parameter
        if($request->check <= 20)
        {
            return redirect('home');
        }
        return $next($request);
    }
}
