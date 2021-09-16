<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsDevOrAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $roleType = Auth::user()->role;
            if ($roleType == "DEV") return $next($request);
            elseif ($roleType == "ADMIN") return $next($request);
            else return abort(403);
        }
        return abort(403);
    }
}
