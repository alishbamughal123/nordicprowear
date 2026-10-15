<x-layouts.app :title="__('ui.products.title')" :description="__('ui.products.text')">
    <x-page-header :title="__('ui.products.title')" :text="__('ui.products.text')" :eyebrow="__('ui.nav.products')" />

    <section class="section">
        <div class="container-x">
            <nav class="flex flex-wrap gap-3" aria-label="{{ __('ui.products.filter') }}">
                <a href="{{ lroute('products') }}" @if (! $active) aria-current="true" @endif
                   class="rounded-full border px-5 py-2 text-sm font-semibold transition {{ ! $active ? 'border-navy-900 bg-navy-900 text-white' : 'border-navy-900/20 text-navy-900 hover:border-navy-900' }}">{{ __('ui.common.all') }}</a>
                @foreach ($collections as $collection)
                    <a href="{{ lroute('products', ['collection' => $collection['slug']]) }}" @if ($active === $collection['slug']) aria-current="true" @endif
                       class="rounded-full border px-5 py-2 text-sm font-semibold transition {{ $active === $collection['slug'] ? 'border-navy-900 bg-navy-900 text-white' : 'border-navy-900/20 text-navy-900 hover:border-navy-900' }}">{{ $collection['name'] }}</a>
                @endforeach
            </nav>

            @if ($products->isEmpty())
                <p class="mt-12 text-muted">{{ __('ui.products.empty') }}</p>
            @else
                <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    @foreach ($products as $product)
                        <div class="reveal"><x-product-card :product="$product" /></div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <x-cta-band />
</x-layouts.app>
