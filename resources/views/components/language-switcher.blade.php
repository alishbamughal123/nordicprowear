<div class="flex items-center rounded-full border border-navy-900/15 p-0.5 text-xs font-semibold" role="group" aria-label="{{ __('ui.nav.language') }}">
    @foreach (config('site.locales') as $code => $meta)
        @php $active = app()->getLocale() === $code; @endphp
        <a href="{{ switch_locale_url($code) }}"
           lang="{{ $meta['html'] }}" hreflang="{{ $meta['html'] }}"
           title="{{ $meta['label'] }}"
           @if ($active) aria-current="true" @endif
           class="rounded-full px-3 py-1.5 transition {{ $active ? 'bg-navy-900 text-white' : 'text-muted hover:text-navy-900' }}">{{ $meta['short'] }}</a>
    @endforeach
</div>
