<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!session()->has('id')) {
            return redirect('/')->with('error', 'Please login first');
        }

        return $next($request);
    }
}
