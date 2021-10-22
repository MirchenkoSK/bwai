<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RequireRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (auth()->user()->role->name != $role) {
            if (!($role == 'admin' && auth()->user()->role->name == 'moderator')) {
                return back()->with('message', 'Access denied');
            }
        }
        return $next($request);
    }
}
