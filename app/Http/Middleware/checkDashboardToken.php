<?php

namespace App\Http\Middleware;

use Closure;

class checkDashboardToken
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
        if(session()->has("user_token")){
            return $next($request);
        }else{
            return redirect()->route("login");
        }

    }
}
