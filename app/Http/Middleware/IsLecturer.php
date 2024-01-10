<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsLecturer
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        if (auth()->user()->hasRole('lecturer') || auth()->user()->hasRole('admin')) {
            return $next($request);
        }
        return redirect()->route('/');
    }
}
