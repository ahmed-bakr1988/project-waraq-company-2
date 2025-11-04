<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CspMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $nonce = Str::random(32);

        // Make nonce available to views before handling the request
        app()->instance('csp-nonce', $nonce);

        $response = $next($request);

        // DEV-ONLY: More permissive CSP for local development
        if (app()->environment('local')) {
            $response->headers->set('Content-Security-Policy', "
                default-src 'self';
                script-src 'self' 'nonce-{$nonce}' 'unsafe-eval' http://127.0.0.1:5174;
                style-src 'self' 'unsafe-inline' http://127.0.0.1:5174;
                connect-src 'self' ws://127.0.0.1:5174 http://127.0.0.1:5174;
                img-src 'self' data: blob:;
                font-src 'self' data:;
                worker-src 'self' blob:;
            ");
        } else {
            // PRODUCTION CSP - more restrictive
            $response->headers->set('Content-Security-Policy', "
                default-src 'self';
                script-src 'self' 'nonce-{$nonce}';
                style-src 'self';
                img-src 'self' data:;
                font-src 'self' data:;
                worker-src 'self' blob:;
            ");
        }

        return $response;
    }
}
