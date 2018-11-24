<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('login');

            }
        }

        if (Auth::guard($guard)->guest() == false && Auth::user()->role != 1 && Auth::user()->status != 1) {
            Auth::logout();
            return redirect()->guest('login');
        }
        return $next($request);
    }
}
