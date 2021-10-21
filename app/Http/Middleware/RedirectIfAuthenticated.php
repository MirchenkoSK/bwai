<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {

                $role = Auth::user()->role;
                switch ($role->name) {
                    case 'root':
                        $route = RouteServiceProvider::ADMIN;
                        break;

                    case 'admin':
                        $route = RouteServiceProvider::ADMIN;
                        break;

                    case 'moderator':
                        $route = RouteServiceProvider::ADMIN;
                        break;

                    case 'manager':
                        $route = RouteServiceProvider::MANAGER;
                        break;

                    case 'client':
                        $route = RouteServiceProvider::CLIENT;
                        break;

                    default:
                        $route = RouteServiceProvider::HOME;
                        break;
                }

                return redirect($route);
            }
        }

        return $next($request);
    }
}
