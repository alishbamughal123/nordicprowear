<x-layouts.app :title="__('ui.about.title')" :description="__('ui.about.text')">
    <x-page-header :title="__('ui.about.title')" :text="__('ui.about.text')" :eyebrow="config('site.name')" />

    <section class="section">
        <div class="container-x grid items-center gap-14 lg:grid-cols-2">
            <div class="reveal">
                <img src="{{ asset('images/photos/about.jpg') }}" alt="" class="aspect-[8/7] w-full rounded-3xl object-cover" loading="lazy">
            </div>
            <div class="reveal">
                <h2 class="h-section">{{ __('ui.about.story_title') }}</h2>
                @foreach (__('ui.about.story') as $paragraph)
                    <p class="lead mt-5">{{ $paragraph }}</p>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section bg-sand-100">
        <div class="container-x">
            <h2 class="h-section reveal text-center">{{ __('ui.about.values_title') }}</h2>
            <div class="mt-12 grid gap-6 md:grid-cols-3">
                @foreach (__('ui.about.values') as $value)
                    <div class="reveal rounded-2xl bg-white p-8">
                        <h3 class="text-xl font-bold">{{ $value['title'] }}</h3>
                        <p class="mt-3 text-muted">{{ $value['text'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <div class="pt-20 sm:pt-28"><x-cta-band /></div>
</x-layouts.app>
