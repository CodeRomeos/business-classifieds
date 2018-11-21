<?php

namespace App\Http\Middleware;

use Closure;

class CheckIfBlocked
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
        if($request->user()->isBlocked)
	 	{
	 		return redirect(route('user-blocked'));
	 	}
        return $next($request);
    }
}
