<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddSecurityHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Prevent clickjacking attacks
        $response->header('X-Frame-Options', 'SAMEORIGIN');

        // Prevent MIME type sniffing
        $response->header('X-Content-Type-Options', 'nosniff');

        // Enable XSS protection in older browsers
        $response->header('X-XSS-Protection', '1; mode=block');

        // Content Security Policy - prevents inline scripts and restricts resource loading
        $response->header(
            'Content-Security-Policy',
            "default-src 'self'; " .
            "script-src 'self' 'unsafe-inline' 'unsafe-eval'; " .
            "style-src 'self' 'unsafe-inline'; " .
            "img-src 'self' data: https:; " .
            "font-src 'self' data:; " .
            "connect-src 'self'; " .
            "frame-ancestors 'self'; " .
            "upgrade-insecure-requests"
        );

        // Referrer Policy - control information sent in Referer header
        $response->header('Referrer-Policy', 'strict-origin-when-cross-origin');

        // Permissions Policy - control browser features
        $response->header(
            'Permissions-Policy',
            'accelerometer=(), camera=(), geolocation=(), gyroscope=(), ' .
            'magnetometer=(), microphone=(), payment=(), usb=()'
        );

        // Strict Transport Security - enforce HTTPS
        if (app()->environment('production')) {
            $response->header(
                'Strict-Transport-Security',
                'max-age=31536000; includeSubDomains'
            );
        }

        // Prevent search engine indexing in non-production environments
        if (!app()->environment('production')) {
            $response->header('X-Robots-Tag', 'noindex, nofollow');
        }

        return $response;
    }
}
