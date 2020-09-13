<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Gate;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, string $ability)
    {
        if (Gate::denies($ability)) {
            return response('You aren\'t allowed to make any changes', 401);
        }

        return $next($request);
    }
}
