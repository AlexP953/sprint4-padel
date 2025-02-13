<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
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
        $user = auth()->user()->rol;
        \Log::info('');
        if (!auth()->check() || auth()->user()->rol !== 'admin') {
            return redirect('/');
        }

        return $next($request);
    }
}