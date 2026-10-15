<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /** Norwegian is served at "/", every other locale under its own prefix ("/en"). */
    public function handle(Request $request, Closure $next): Response
    {
        $segment = $request->segment(1);
        $locale = array_key_exists($segment, config('site.locales')) ? $segment : default_locale();

        app()->setLocale($locale);
        $request->setLocale($locale);

        return $next($request);
    }
}
