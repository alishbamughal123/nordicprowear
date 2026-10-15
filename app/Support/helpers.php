<?php

use Illuminate\Support\Facades\Route;

if (! function_exists('default_locale')) {
    function default_locale(): string
    {
        return array_key_first(config('site.locales'));
    }
}

if (! function_exists('lroute')) {
    /**
     * Generate a URL for a locale-aware route. Pass the base name ("home", "product.show");
     * the English variants are registered as "en.<name>".
     */
    function lroute(string $name, array $parameters = [], ?string $locale = null): string
    {
        $locale ??= app()->getLocale();
        $routeName = $locale === default_locale() ? $name : "$locale.$name";

        return route($routeName, $parameters);
    }
}

if (! function_exists('switch_locale_url')) {
    /** URL of the current page in another locale (falls back to its home page). */
    function switch_locale_url(string $locale): string
    {
        $route = Route::current();
        $base = preg_replace('/^[a-z]{2}\./', '', (string) $route?->getName());

        if (! $base || ! Route::has($locale === default_locale() ? $base : "$locale.$base")) {
            return lroute('home', [], $locale);
        }

        return lroute($base, $route->parameters(), $locale);
    }
}
