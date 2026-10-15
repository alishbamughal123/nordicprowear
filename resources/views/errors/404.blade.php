<x-layouts.app :title="__('ui.errors.404_title')">
    <section class="section">
        <div class="container-x text-center">
            <p class="font-display text-7xl font-extrabold text-ice-300">404</p>
            <h1 class="h-section mt-4">{{ __('ui.errors.404_title') }}</h1>
            <p class="lead mx-auto mt-4 max-w-md">{{ __('ui.errors.404_text') }}</p>
            <a href="{{ lroute('home') }}" class="btn btn-primary mt-8">{{ __('ui.errors.home') }}</a>
        </div>
    </section>
</x-layouts.app>
