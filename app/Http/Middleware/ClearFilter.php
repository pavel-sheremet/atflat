<?php

namespace App\Http\Middleware;

use App\Helpers\Request as RequestHelper;
use Closure;
use Illuminate\Http\Request;

class ClearFilter
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (RequestHelper::isClear())
        {
            return redirect()->to(RequestHelper::getWithout(['filter']));
        }

        return $next($request);
    }
}
