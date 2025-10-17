<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureApiToken
{
    public function handle(Request $request, Closure $next): Response
    {
        $expected = (string) config('app.api_token', env('API_TOKEN'));

        $provided = (string) $request->header('X-API-Token', '');

        // In production: token must be configured and must match
        if (app()->environment('production')) {
            if ($expected === '' || $expected === null || ! hash_equals($expected, $provided)) {
                return response()->json([
                    'message' => 'Unauthorized: invalid API token.',
                ], 401);
            }
        } else {
            // In non-production: if a token is configured, enforce it; otherwise allow
            if ($expected !== '' && $expected !== null && ! hash_equals($expected, $provided)) {
                return response()->json([
                    'message' => 'Unauthorized: invalid API token.',
                ], 401);
            }
        }

        return $next($request);
    }
}
