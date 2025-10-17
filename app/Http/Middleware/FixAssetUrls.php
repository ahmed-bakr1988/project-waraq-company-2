<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FixAssetUrls
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Add headers for static assets
        if ($this->isAssetRequest($request)) {
            $response->headers->set('Cache-Control', 'public, max-age=31536000');
            $response->headers->set('Access-Control-Allow-Origin', '*');
        }

        return $response;
    }

    /**
     * Check if the request is for a static asset
     */
    private function isAssetRequest(Request $request): bool
    {
        $path = $request->path();
        $assetExtensions = ['css', 'js', 'jpg', 'jpeg', 'png', 'gif', 'webp', 'svg', 'ico', 'woff', 'woff2', 'ttf', 'eot'];

        foreach ($assetExtensions as $ext) {
            if (str_ends_with($path, '.'.$ext)) {
                return true;
            }
        }

        return str_starts_with($path, 'assets/') || str_starts_with($path, 'storage/');
    }
}
