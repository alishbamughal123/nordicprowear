<x-layouts.app :title="__('ui.certifications.title')" :description="__('ui.certifications.text')">
    <x-page-header :title="__('ui.certifications.title')" :text="__('ui.certifications.text')" :eyebrow="__('ui.nav.certifications')">
        <a href="#docs" class="btn btn-light mt-8">{{ __('ui.certifications.cta') }} <span aria-hidden="true">↓</span></a>
    </x-page-header>

    <section class="section">
        <div class="container-x">
            <h2 class="reveal text-sm font-semibold uppercase tracking-[0.18em] text-navy-700">{{ __('ui.certifications.lead') }}</h2>

            <div class="mt-8 grid gap-6 md:grid-cols-2">
                @foreach (__('ui.certifications.items') as $item)
                    <article class="card reveal flex flex-col p-7 sm:p-8">
                        <p class="text-xs font-semibold uppercase tracking-widest {{ $item['status'] ? 'text-amber-700' : 'text-navy-700' }}">{{ $item['subtitle'] }}</p>
                        <h3 class="mt-2 text-xl font-bold">{{ $item['title'] }}</h3>
                        <p class="mt-3 text-sm leading-relaxed text-muted">{{ $item['text'] }}</p>

                        @if ($item['points'])
                            <ul class="mt-5 space-y-2.5 border-t border-navy-900/10 pt-5 text-sm font-medium">
                                @foreach ($item['points'] as $point)
                                    <li class="flex items-start gap-3">
                                        <svg class="mt-0.5 h-4 w-4 shrink-0 text-navy-700" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 010 1.4l-7.5 7.5a1 1 0 01-1.4 0L3.3 9.7a1 1 0 011.4-1.4l3.8 3.8 6.8-6.8a1 1 0 011.4 0z" clip-rule="evenodd"/></svg>
                                        {{ $point }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                        @if ($item['status'])
                            <p class="mt-5 rounded-xl bg-sand-100 px-4 py-3 text-sm font-semibold text-navy-900">{{ __('ui.certifications.status_label') }}: {{ $item['status'] }}</p>
                        @endif
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section id="docs" class="section pt-0">
        <div class="container-x">
            <div class="reveal rounded-3xl bg-ice-100 p-7 sm:p-10">
                <h2 class="h-section">{{ __('ui.certifications.cta') }}</h2>
                <ul class="mt-6 grid gap-4 md:grid-cols-3">
                    @foreach (__('ui.certifications.docs') as $doc)
                        <li class="flex items-center justify-between gap-3 rounded-xl border border-navy-900/10 bg-white px-5 py-4">
                            <span class="text-sm font-semibold text-navy-900">{{ $doc }}</span>
                            <span class="flex gap-3 text-xs font-semibold text-navy-700">
                                <a href="{{ config('site.certifications_pdf') }}" target="_blank" rel="noopener" class="hover:underline">{{ __('ui.common.open') }}</a>
                                <a href="{{ config('site.certifications_pdf') }}" download class="hover:underline">{{ __('ui.common.download') }}</a>
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

    <x-cta-band />
</x-layouts.app>
