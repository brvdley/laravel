<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminRequired
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
        if (auth()->user()?->username !== 'tester') {
            return redirect('/')->with('success', ' this request...');
        }

        return $next($request);
    }
}

