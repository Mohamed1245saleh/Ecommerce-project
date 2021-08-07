<?php

namespace App\Http\Middleware;

use Closure;

class preventBackHistory
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
        $response = $next($request);

        return $response->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0,    pre-check=0')
                        ->header('Expires','Sun, 02 Jan 1990 00:00:00 GMT');
    }
}
