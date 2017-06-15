<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if(!$request->user()) {
            return redirect()->guest(route('login'))->with('flash_message', 'Please login first.');
        }

        if(!$request->user()->hasRole($role)) {
            return response('Unauthorized.', 401);
        }

        return $next($request);
    }
}
