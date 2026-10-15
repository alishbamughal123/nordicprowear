@props(['title' => __('ui.home.cta_title'), 'text' => __('ui.home.cta_text')])

<section class="section pt-0">
    <div class="container-x">
        <div class="reveal relative overflow-hidden rounded-3xl bg-navy-900 px-8 py-12 text-center text-white sm:px-16 sm:py-16">
            <img src="{{ asset('images/photos/cta.jpg') }}" alt="" class="absolute inset-0 h-full w-full object-cover opacity-30 grayscale" aria-hidden="true">
            <div class="relative mx-auto max-w-2xl">
                <h2 class="h-section !text-white">{{ $title }}</h2>
                <p class="mt-4 text-ice-200">{{ $text }}</p>
                <a href="{{ lroute('contact') }}" class="btn btn-light mt-8">{{ __('ui.common.request_quote') }} <span aria-hidden="true">→</span></a>
            </div>
        </div>
    </div>
</section>
