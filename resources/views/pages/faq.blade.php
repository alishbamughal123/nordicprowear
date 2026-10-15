<x-layouts.app :title="__('ui.faq.title')" :description="__('ui.faq.text')">
    <x-page-header :title="__('ui.faq.title')" :text="__('ui.faq.text')" :eyebrow="__('ui.nav.faq')" />

    <section class="section">
        <div class="container-x max-w-3xl">
            <div class="divide-y divide-navy-900/10 rounded-2xl border border-navy-900/10">
                @foreach (__('ui.faq.items') as $item)
                    <details class="group p-6" @if ($loop->first) open @endif>
                        <summary class="flex cursor-pointer list-none items-center justify-between gap-4 font-display text-lg font-bold text-navy-900">
                            {{ $item['q'] }}
                            <span class="text-2xl font-light text-navy-700 transition group-open:rotate-45" aria-hidden="true">+</span>
                        </summary>
                        <p class="mt-4 leading-relaxed text-muted">{{ $item['a'] }}</p>
                    </details>
                @endforeach
            </div>

            <div class="mt-12 rounded-2xl bg-ice-100 p-8 text-center">
                <h2 class="text-2xl font-bold">{{ __('ui.faq.more_title') }}</h2>
                <p class="mt-2 text-muted">{{ __('ui.faq.more_text') }}</p>
                <a href="{{ lroute('contact') }}" class="btn btn-primary mt-6">{{ __('ui.nav.contact') }}</a>
            </div>
        </div>
    </section>
</x-layouts.app>
