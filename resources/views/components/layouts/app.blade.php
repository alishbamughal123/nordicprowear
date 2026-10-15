@props(['title' => null, 'description' => null])

@php
    $locales = config('site.locales');
    $current = $locales[app()->getLocale()];
    $pageTitle = ($title ? $title.' – ' : '').config('site.name');
    $metaDescription = $description ?? __('ui.meta.default_description');
    $nav = [
        ['home', 'ui.nav.home'],
        ['collections', 'ui.nav.collections'],
        ['products', 'ui.nav.products'],
        ['about', 'ui.nav.about'],
        ['certifications', 'ui.nav.certifications'],
    ];
    $isActive = fn (string $name) => request()->routeIs(
        $name, "en.$name", $name === 'products' ? 'product.*' : $name.'.*', $name === 'products' ? 'en.product.*' : "en.$name.*"
    );
@endphp
<!DOCTYPE html>
<html lang="{{ $current['html'] }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $pageTitle }}</title>
    <meta name="description" content="{{ $metaDescription }}">
    <meta name="theme-color" content="#072146">

    <link rel="canonical" href="{{ url()->current() }}">
    @foreach ($locales as $code => $meta)
        <link rel="alternate" hreflang="{{ $meta['html'] }}" href="{{ switch_locale_url($code) }}">
    @endforeach
    <link rel="alternate" hreflang="x-default" href="{{ switch_locale_url(default_locale()) }}">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ config('site.name') }}">
    <meta property="og:title" content="{{ $pageTitle }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:locale" content="{{ $current['og'] }}">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">

    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Manrope:wght@600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen flex-col">
    <a href="#main" class="sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-[60] focus:rounded-lg focus:bg-white focus:px-4 focus:py-2">{{ __('ui.nav.skip') }}</a>

    <header class="sticky top-0 z-50 border-b border-navy-900/10 bg-white/90 backdrop-blur">
        <div class="container-x flex h-20 items-center justify-between gap-6">
            <a href="{{ lroute('home') }}" class="shrink-0" aria-label="{{ config('site.name') }}">
                <x-logo class="h-14 w-auto" />
            </a>

            <nav class="hidden items-center gap-8 lg:flex" aria-label="{{ __('ui.nav.main') }}">
                @foreach ($nav as [$route, $label])
                    <a href="{{ lroute($route) }}"
                       @if ($isActive($route)) aria-current="page" @endif
                       class="text-sm font-medium transition hover:text-navy-700 {{ $isActive($route) ? 'text-navy-900 underline decoration-2 underline-offset-8' : 'text-muted' }}">
                        {{ __($label) }}
                    </a>
                @endforeach
            </nav>

            <div class="flex items-center gap-3">
                <x-language-switcher />
                <a href="{{ lroute('contact') }}" class="btn btn-primary hidden sm:inline-flex">{{ __('ui.nav.quote') }}</a>
                <button type="button" data-nav-toggle aria-expanded="false" aria-controls="mobile-nav"
                        class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-navy-900/15 lg:hidden"
                        aria-label="{{ __('ui.nav.menu') }}">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M4 7h16M4 12h16M4 17h16"/></svg>
                </button>
            </div>
        </div>

        <div id="mobile-nav" data-nav-panel class="hidden border-t border-navy-900/10 bg-white lg:hidden">
            <nav class="container-x flex flex-col py-4" aria-label="{{ __('ui.nav.main') }}">
                @foreach ($nav as [$route, $label])
                    <a href="{{ lroute($route) }}" class="border-b border-navy-900/5 py-4 text-base font-semibold text-navy-900">{{ __($label) }}</a>
                @endforeach
                <a href="{{ lroute('contact') }}" class="btn btn-primary mt-5">{{ __('ui.nav.quote') }}</a>
            </nav>
        </div>
    </header>

    <main id="main" class="flex-1">
        {{ $slot }}
    </main>

    <footer class="bg-navy-950 text-ice-300">
        <div class="container-x grid gap-12 py-16 md:grid-cols-4">
            <div class="md:col-span-2">
                <x-logo class="h-16 w-auto rounded" />
                <p class="mt-5 max-w-sm text-sm leading-relaxed">{{ __('ui.footer.tagline') }}</p>
            </div>
            <div>
                <h2 class="font-display text-sm font-bold uppercase tracking-widest text-white">{{ __('ui.footer.explore') }}</h2>
                <ul class="mt-5 space-y-3 text-sm">
                    @foreach ($nav as [$route, $label])
                        <li><a href="{{ lroute($route) }}" class="transition hover:text-white">{{ __($label) }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div>
                <h2 class="font-display text-sm font-bold uppercase tracking-widest text-white">{{ __('ui.footer.help') }}</h2>
                <ul class="mt-5 space-y-3 text-sm">
                    <li><a href="{{ lroute('support') }}" class="transition hover:text-white">{{ __('ui.nav.support') }}</a></li>
                    <li><a href="{{ lroute('faq') }}" class="transition hover:text-white">{{ __('ui.nav.faq') }}</a></li>
                    <li><a href="{{ lroute('contact') }}" class="transition hover:text-white">{{ __('ui.nav.contact') }}</a></li>
                    <li><a href="mailto:{{ config('site.contact.email') }}" class="transition hover:text-white">{{ config('site.contact.email') }}</a></li>
                </ul>
            </div>
        </div>
        <div class="border-t border-white/10">
            <p class="container-x py-6 text-xs">{{ __('ui.footer.copyright', ['year' => date('Y')]) }}</p>
        </div>
    </footer>
</body>
</html>
