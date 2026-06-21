<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     * Hanya admin yang boleh akses route ini
     */
    public function handle(Request $request, Closure $next)
    {
        // cek user login & role admin
        if (auth()->check() && auth()->user()->role === 'admin') {
            return $next($request);
        }

        // selain admin → redirect ke dashboard
        return redirect('/')->with('error', 'Hanya admin yang bisa mengakses halaman ini.');
    }
}