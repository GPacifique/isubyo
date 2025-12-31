<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Available locales
     */
    protected array $locales = ['en', 'fr', 'sw', 'rw'];

    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check for locale in session
        if (Session::has('locale')) {
            $locale = Session::get('locale');
            if (in_array($locale, $this->locales)) {
                App::setLocale($locale);
            }
        }
        // Check for locale in URL parameter
        elseif ($request->has('lang')) {
            $locale = $request->get('lang');
            if (in_array($locale, $this->locales)) {
                Session::put('locale', $locale);
                App::setLocale($locale);
            }
        }
        // Use browser preference as fallback
        elseif ($request->hasHeader('Accept-Language')) {
            $browserLocale = substr($request->header('Accept-Language'), 0, 2);
            if (in_array($browserLocale, $this->locales)) {
                App::setLocale($browserLocale);
            }
        }

        return $next($request);
    }
}
