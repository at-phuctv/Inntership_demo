<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request description
     * @param \Closure                 $next    description
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role->role==config('user.ROLE_ADMIN')) {
            return $next($request);
        }
        return redirect('/login');
    }
}
