<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class AdminAuthMiddleware
{
    /**
     * 是否是管理员
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->role != 1)
        {
            abort(404);
        }

        return $next($request);
    }
}
