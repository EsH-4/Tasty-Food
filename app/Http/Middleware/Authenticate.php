<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Route;

class Authenticate extends Middleware
{
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            // Check if this is an admin route
            if ($request->is('admin/*')) {
                return route('admin.login');
            }

            // For non-admin routes, redirect to admin login since this appears to be an admin-focused application
            return route('admin.login');
        }
    }
}
