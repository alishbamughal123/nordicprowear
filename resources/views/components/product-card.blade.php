@props(['product'])

<a href="{{ lroute('product.show', ['slug' => $product['slug']]) }}" class="group block">
    <div class="relative aspect-[4/5] overflow-hidden rounded-2xl bg-ice-100">
        <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" loading="lazy" class="h-full w-full object-cover object-top transition duration-700 group-hover:scale-105">
        <div class="absolute inset-0 bg-gradient-to-t from-navy-950/50 via-transparent to-transparent opacity-0 transition duration-300 group-hover:opacity-100"></div>
        @if ($product['bestseller'])
            <span class="absolute left-4 top-4 rounded-full bg-white/95 px-3 py-1 text-xs font-semibold text-navy-900 shadow">{{ __('ui.common.bestseller') }}</span>
        @endif
        <span class="absolute bottom-4 right-4 flex h-11 w-11 translate-y-2 items-center justify-center rounded-full bg-white text-navy-900 opacity-0 shadow-lg transition duration-300 group-hover:translate-y-0 group-hover:opacity-100" aria-hidden="true">→</span>
    </div>
    <div class="px-1 pt-5">
        <p class="text-xs font-semibold uppercase tracking-widest text-navy-700">{{ $product['collection_name'] }}</p>
        <h3 class="mt-1.5 text-lg font-bold">{{ $product['name'] }}</h3>
        <p class="mt-1.5 text-sm leading-relaxed text-muted">{{ $product['description'] }}</p>
    </div>
</a>
