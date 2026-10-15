<x-layouts.app :title="$product['name']" :description="$product['description']">
    <section class="section pb-12 sm:pb-16">
        <div class="container-x">
            <nav aria-label="{{ __('ui.common.breadcrumb') }}" class="mb-8 text-sm text-muted">
                <a href="{{ lroute('products') }}" class="hover:text-navy-900">← {{ __('ui.common.back_to_products') }}</a>
            </nav>

            <div class="grid gap-12 lg:grid-cols-2">
                <div class="overflow-hidden rounded-3xl bg-ice-100">
                    <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="aspect-[6/7] w-full object-cover">
                </div>
                <div class="flex flex-col justify-center">
                    <a href="{{ lroute('products', ['collection' => $product['collection']]) }}" class="eyebrow">{{ $product['collection_name'] }}</a>
                    <h1 class="h-section sm:!text-4xl">{{ $product['name'] }}</h1>
                    <p class="lead mt-5">{{ $product['description'] }}</p>

                    <h2 class="mt-10 text-sm font-bold uppercase tracking-widest">{{ __('ui.products.details_title') }}</h2>
                    <ul class="mt-4 space-y-3">
                        @foreach ($product['details'] as $detail)
                            <li class="flex items-start gap-3">
                                <svg class="mt-0.5 h-5 w-5 shrink-0 text-navy-700" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 010 1.4l-7.5 7.5a1 1 0 01-1.4 0L3.3 9.7a1 1 0 011.4-1.4l3.8 3.8 6.8-6.8a1 1 0 011.4 0z" clip-rule="evenodd"/></svg>
                                {{ $detail }}
                            </li>
                        @endforeach
                    </ul>

                    <div class="mt-10 rounded-2xl bg-sand-100 p-6">
                        <p class="font-display font-bold text-navy-900">{{ __('ui.products.customise_title') }}</p>
                        <p class="mt-2 text-sm text-muted">{{ __('ui.products.customise_text') }}</p>
                        <p class="mt-3 text-sm font-semibold text-navy-700">{{ __('ui.common.price_on_request') }}</p>
                    </div>

                    <a href="{{ lroute('contact') }}" class="btn btn-primary mt-8 self-start">{{ __('ui.common.quote_for_product') }} <span aria-hidden="true">→</span></a>
                </div>
            </div>
        </div>
    </section>

    @if ($related->isNotEmpty())
        <section class="section pt-8">
            <div class="container-x">
                <h2 class="h-section">{{ __('ui.common.related') }}</h2>
                <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($related as $item)
                        <x-product-card :product="$item" />
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</x-layouts.app>
