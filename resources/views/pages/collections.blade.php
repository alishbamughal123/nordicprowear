<x-layouts.app :title="__('ui.nav.collections')" :description="__('ui.collections.text')">
    <x-page-header :title="__('ui.collections.title')" :text="__('ui.collections.text')" :eyebrow="__('ui.nav.collections')" />

    <section class="section">
        <div class="container-x grid gap-8 md:grid-cols-2">
            @foreach ($collections as $collection)
                <a href="{{ lroute('products', ['collection' => $collection['slug']]) }}" class="card card-hover reveal group grid sm:grid-cols-2">
                    <div class="aspect-[4/3] overflow-hidden bg-navy-900 sm:aspect-auto">
                        <img src="{{ $collection['image'] }}" alt="" loading="lazy" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                    </div>
                    <div class="flex flex-col justify-center p-8">
                        <h2 class="text-2xl font-bold">{{ $collection['name'] }}</h2>
                        <p class="mt-3 text-muted">{{ $collection['description'] }}</p>
                        <span class="link-arrow mt-6">{{ __('ui.common.see_products') }} <span aria-hidden="true">→</span></span>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    <x-cta-band />
</x-layouts.app>
