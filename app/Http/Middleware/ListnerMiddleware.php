<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ListnerMiddleware
{
    public function handle(Request $request, Closure $next): Response // Add Response type hint
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role !== 'listner') {
            abort(403, 'Unauthorized action.');
        }
        return $next($request);
    }
}