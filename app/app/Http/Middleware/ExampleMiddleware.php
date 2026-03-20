<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExampleMiddleware
{
    /**
     * Simple middleware demo: blocks unless `?allow=1`.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->query('allow') !== '1') {
            abort(403, 'ExampleMiddleware denied access. Add ?allow=1');
        }

        $response = $next($request);
        $response->headers->set('X-Example-Middleware', 'enabled');

        return $response;
    }
}

