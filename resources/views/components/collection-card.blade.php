@props(['collection'])

<a href="{{ lroute('products', ['collection' => $collection['slug']]) }}" class="group relative block aspect-[3/4] overflow-hidden rounded-2xl bg-navy-900">
    <img src="{{ $collection['image'] }}" alt="" loading="lazy" class="absolute inset-0 h-full w-full object-cover object-top transition duration-700 group-hover:scale-105">
    <div class="absolute inset-0 bg-gradient-to-t from-navy-950 via-navy-950/30 to-transparent"></div>
    <div class="absolute inset-x-0 bottom-0 p-6 text-white">
        <h3 class="text-xl font-bold !text-white">{{ $collection['name'] }}</h3>
        <p class="mt-1.5 text-sm text-ice-200">{{ $collection['description'] }}</p>
        <span class="mt-4 inline-flex items-center gap-1.5 text-sm font-semibold transition group-hover:gap-3">{{ __('ui.common.see_products') }} <span aria-hidden="true">→</span></span>
    </div>
</a>
