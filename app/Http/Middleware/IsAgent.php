<?php

namespace App\Http\Middleware;

use Closure;

class IsAgent
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
        if (!\Auth::user()->isAgent()) {
            return redirect()->route('agent.create');
        }

        return $next($request);
    }
}
