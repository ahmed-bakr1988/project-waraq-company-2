<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Security Headers
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-Frame-Options', 'DENY');
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->headers->set('Permissions-Policy', 'geolocation=(), camera=(), microphone=()');

        // Strict Content Security Policy, relaxed for Filament admin pages to allow Alpine/Livewire
        $isFilament = $request->is('admin*');

        $scriptSrc = ["'self'"];
        if ($isFilament) {
            // Filament + Alpine v3 require 'unsafe-eval' for expression evaluation.
            // Filament also renders a few inline <script> tags (theme/echo helpers), so allow inline only on admin.
            $scriptSrc[] = "'unsafe-inline'";
            $scriptSrc[] = "'unsafe-eval'";
        }

        $directives = [
            "default-src 'self'",
            'script-src '.implode(' ', $scriptSrc),
            "style-src 'self' 'unsafe-inline'",
            "img-src 'self' data: blob:",
            "font-src 'self' data:",
            "connect-src 'self'",
            "base-uri 'self'",
            "form-action 'self'",
            "frame-ancestors 'none'",
        ];

        // Relax connect-src for local Vite HMR only (no external fonts/scripts)
        if (app()->environment('local')) {
            $directives = array_map(function (string $d) {
                if (str_starts_with($d, 'connect-src')) {
                    return $d.' ws://localhost:8000 http://localhost:8000';
                }

                return $d;
            }, $directives);
        }

        $response->headers->set('Content-Security-Policy', implode('; ', $directives).';');

        // HSTS only in production, on HTTPS, and matching configured app URL host
        if (app()->environment('production') && $request->isSecure()) {
            $host = parse_url((string) config('app.url'), PHP_URL_HOST);
            if (! empty($host) && $request->getHost() === $host) {
                $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains; preload');
            }
        }

        return $response;
    }
}
