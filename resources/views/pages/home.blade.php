<x-layouts.app :title="__('ui.meta.default_title')">
    {{-- Hero --}}
    <section class="relative isolate overflow-hidden bg-navy-950 text-white">
        <img src="{{ asset('images/hero.svg') }}" alt="" class="absolute inset-0 -z-10 h-full w-full object-cover opacity-40" aria-hidden="true">
        <div class="container-x grid items-center gap-14 py-16 lg:min-h-[620px] lg:grid-cols-12 lg:py-20">
            <div class="lg:col-span-6">
                <p class="eyebrow !text-ice-400">{{ __('ui.home.eyebrow') }}</p>
                <h1 class="h-display !text-white">{{ __('ui.home.title') }}</h1>
                <p class="mt-5 max-w-xl text-base leading-relaxed text-ice-200">{{ __('ui.home.text') }}</p>
                <div class="mt-10 flex flex-wrap gap-4">
                    <a href="{{ lroute('contact') }}" class="btn btn-light">{{ __('ui.home.cta_primary') }} <span aria-hidden="true">→</span></a>
                    <a href="{{ lroute('collections') }}" class="btn btn-ghost">{{ __('ui.home.cta_secondary') }}</a>
                </div>
                <ul class="mt-12 flex flex-wrap gap-2" aria-label="{{ __('ui.home.sectors_label') }}">
                    @foreach (__('ui.home.sectors') as $sector)
                        <li class="rounded-full border border-white/20 px-4 py-1.5 text-xs font-semibold text-ice-200">{{ $sector }}</li>
                    @endforeach
                </ul>
            </div>

            <div class="relative lg:col-span-6">
                <div class="grid grid-cols-6 grid-rows-6 gap-4 sm:gap-5">
                    <img src="{{ asset('images/photos/hero-kitchen.jpg') }}" alt="" class="col-span-4 row-span-6 h-[380px] w-full rounded-3xl object-cover object-top sm:h-[470px]">
                    <img src="{{ asset('images/photos/hero-health.jpg') }}" alt="" class="col-span-2 row-span-3 h-full w-full rounded-3xl object-cover object-top">
                    <img src="{{ asset('images/photos/hero-work.jpg') }}" alt="" class="col-span-2 row-span-3 h-full w-full rounded-3xl object-cover">
                </div>
                <div class="absolute -bottom-5 left-4 flex items-center gap-3 rounded-2xl bg-white px-5 py-4 text-navy-900 shadow-2xl sm:left-[-1.5rem]">
                    <span class="flex h-10 w-10 items-center justify-center rounded-full bg-navy-900 text-white">
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 010 1.4l-7.5 7.5a1 1 0 01-1.4 0L3.3 9.7a1 1 0 011.4-1.4l3.8 3.8 6.8-6.8a1 1 0 011.4 0z" clip-rule="evenodd"/></svg>
                    </span>
                    <span class="text-sm font-bold leading-tight">OEKO-TEX®<br><span class="font-medium text-muted">Standard 100</span></span>
                </div>
            </div>
        </div>
    </section>

    {{-- Nordic design --}}
    <section class="section">
        <div class="container-x grid items-center gap-14 lg:grid-cols-2 lg:gap-20">
            <div class="reveal relative">
                <img src="{{ asset('images/photos/design.jpg') }}" alt="" class="aspect-[4/5] w-full rounded-3xl object-cover object-top" loading="lazy">
                <div class="absolute -bottom-6 right-4 max-w-[15rem] rounded-2xl bg-navy-900 p-6 text-white shadow-2xl sm:-right-6">
                    <p class="font-display text-4xl font-extrabold">300+</p>
                    <p class="mt-1 text-sm text-ice-200">{{ __('ui.home.stats.0.label') }}</p>
                </div>
            </div>
            <div class="reveal">
                <p class="eyebrow">{{ __('ui.home.design_eyebrow') }}</p>
                <h2 class="h-section">{{ __('ui.home.design_title') }}</h2>
                <p class="lead mt-5">{{ __('ui.home.design_text') }}</p>
                <ul class="mt-8 space-y-4">
                    @foreach (__('ui.home.design_points') as $point)
                        <li class="flex items-center gap-4 border-b border-navy-900/10 pb-4 font-semibold">
                            <span class="font-display text-sm text-navy-700">0{{ $loop->iteration }}</span>
                            {{ $point }}
                        </li>
                    @endforeach
                </ul>
                <a href="{{ lroute('collections') }}" class="btn btn-primary mt-10">{{ __('ui.home.design_cta') }} <span aria-hidden="true">→</span></a>
            </div>
        </div>
    </section>

    {{-- Collections --}}
    <section class="section bg-sand-100">
        <div class="container-x">
            <div class="reveal flex flex-wrap items-end justify-between gap-6">
                <div class="max-w-2xl">
                    <h2 class="h-section">{{ __('ui.home.collections_title') }}</h2>
                    <p class="lead mt-4">{{ __('ui.home.collections_text') }}</p>
                </div>
                <a href="{{ lroute('collections') }}" class="link-arrow">{{ __('ui.common.view_all') }} <span aria-hidden="true">→</span></a>
            </div>
            <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($collections as $collection)
                    <div class="reveal @if ($loop->even) lg:mt-10 @endif"><x-collection-card :collection="$collection" /></div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Bestsellers --}}
    <section class="section">
        <div class="container-x">
            <div class="reveal flex flex-wrap items-end justify-between gap-6">
                <div class="max-w-xl">
                    <h2 class="h-section">{{ __('ui.home.best_title') }}</h2>
                    <p class="lead mt-4">{{ __('ui.home.best_text') }}</p>
                </div>
                <a href="{{ lroute('products') }}" class="link-arrow">{{ __('ui.common.view_all') }} <span aria-hidden="true">→</span></a>
            </div>
            <div class="mt-12 grid gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5">
                @foreach ($bestsellers as $product)
                    <div class="reveal"><x-product-card :product="$product" /></div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Certifications --}}
    <section class="section relative overflow-hidden bg-navy-900 text-white">
        <img src="{{ asset('images/hero.svg') }}" alt="" class="absolute inset-0 h-full w-full object-cover opacity-25" aria-hidden="true">
        <div class="container-x relative">
            <div class="reveal max-w-2xl">
                <p class="eyebrow !text-ice-400">{{ __('ui.home.cert_eyebrow') }}</p>
                <h2 class="h-section !text-white">{{ __('ui.home.cert_title') }}</h2>
            </div>
            <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                @foreach (__('ui.home.cert_items') as $i => $item)
                    <div class="reveal rounded-2xl border border-white/15 bg-white/5 p-7 backdrop-blur">
                        <span class="font-display text-3xl font-extrabold text-ice-400">0{{ $i + 1 }}</span>
                        <h3 class="mt-4 text-lg font-bold !text-white">{{ $item['title'] }}</h3>
                        <p class="mt-3 text-sm leading-relaxed text-ice-200">{{ $item['text'] }}</p>
                    </div>
                @endforeach
            </div>
            <a href="{{ lroute('certifications') }}" class="btn btn-light mt-12">{{ __('ui.home.cert_cta') }} <span aria-hidden="true">→</span></a>
        </div>
    </section>

    {{-- Process --}}
    <section class="section">
        <div class="container-x">
            <div class="reveal mx-auto max-w-2xl text-center">
                <h2 class="h-section">{{ __('ui.home.process_title') }}</h2>
                <p class="lead mt-4">{{ __('ui.home.process_text') }}</p>
            </div>
            <ol class="mt-14 grid gap-8 md:grid-cols-3">
                @foreach (__('ui.home.steps') as $i => $step)
                    <li class="reveal relative border-t-2 border-navy-900 pt-8">
                        <span class="font-display text-6xl font-extrabold text-ice-300">0{{ $i + 1 }}</span>
                        <h3 class="mt-4 text-xl font-bold">{{ $step['title'] }}</h3>
                        <p class="mt-3 text-muted">{{ $step['text'] }}</p>
                    </li>
                @endforeach
            </ol>
        </div>
    </section>

    <x-cta-band />
</x-layouts.app>
