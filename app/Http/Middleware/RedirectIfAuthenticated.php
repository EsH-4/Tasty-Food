<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // Check if this is an admin route
                if ($request->is('admin/*')) {
                    return redirect()->route('admin.dashboard');
                }

                // Default redirect for other guards
                return redirect('/home');
            }
        }

        return $next($request);
    }
}
