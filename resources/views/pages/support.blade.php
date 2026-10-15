<x-layouts.app :title="__('ui.support.title')" :description="__('ui.support.text')">
    <x-page-header :title="__('ui.support.title')" :text="__('ui.support.text')" :eyebrow="__('ui.nav.support')" />

    <section class="section">
        <div class="container-x">
            <div class="grid gap-6 md:grid-cols-2">
                @foreach (__('ui.support.cards') as $card)
                    <div class="card reveal p-8">
                        <h2 class="text-xl font-bold">{{ $card['title'] }}</h2>
                        <p class="mt-3 text-muted">{{ $card['text'] }}</p>
                    </div>
                @endforeach
            </div>
            <div class="mt-10 flex flex-wrap gap-4">
                <a href="{{ lroute('faq') }}" class="btn btn-outline">{{ __('ui.support.faq_cta') }}</a>
                <a href="{{ lroute('contact') }}" class="btn btn-primary">{{ __('ui.nav.contact') }}</a>
            </div>
        </div>
    </section>
</x-layouts.app>
