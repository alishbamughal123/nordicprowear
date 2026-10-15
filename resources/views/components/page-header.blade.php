@props(['title', 'text' => null, 'eyebrow' => null])

<section class="relative overflow-hidden bg-navy-900 text-white">
    <img src="{{ asset('images/hero.svg') }}" alt="" class="absolute inset-0 h-full w-full object-cover opacity-30" aria-hidden="true">
    <div class="absolute inset-0 bg-gradient-to-r from-navy-950 via-navy-950/70 to-transparent"></div>
    <div class="container-x relative py-14 sm:py-20">
        @if ($eyebrow)
            <p class="eyebrow !text-ice-400">{{ $eyebrow }}</p>
        @endif
        <h1 class="h-display max-w-3xl !text-white">{{ $title }}</h1>
        @if ($text)
            <p class="mt-5 max-w-2xl text-base leading-relaxed text-ice-200">{{ $text }}</p>
        @endif
        {{ $slot }}
    </div>
</section>
