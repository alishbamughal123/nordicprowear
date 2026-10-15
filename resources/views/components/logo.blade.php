{{-- Single place the logo is referenced: replace public/images/logo.png to update it site-wide. --}}
<img src="{{ asset('images/logo.png') }}" alt="{{ config('site.name') }}" {{ $attributes }}>
