<x-layouts.app :title="__('ui.contact.title')" :description="__('ui.contact.text')">
    <x-page-header :title="__('ui.contact.title')" :text="__('ui.contact.text')" :eyebrow="__('ui.nav.quote')" />

    <section class="section">
        <div class="container-x grid gap-12 lg:grid-cols-3">
            <div id="form" class="lg:col-span-2">
                <h2 class="h-section">{{ __('ui.contact.form_title') }}</h2>
                <p class="lead mt-3">{{ __('ui.contact.form_intro') }}</p>

                @if (session('status'))
                    <div role="status" class="mt-6 rounded-xl border border-teal-700/30 bg-teal-50 p-4 text-sm font-medium text-teal-900">{{ session('status') }}</div>
                @endif

                <form method="POST" action="{{ lroute('contact.store') }}" enctype="multipart/form-data" class="mt-8 grid gap-6 sm:grid-cols-2" novalidate>
                    @csrf

                    {{-- Honeypot --}}
                    <div class="hidden" aria-hidden="true">
                        <label for="website">Website</label>
                        <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
                    </div>

                    <div>
                        <label for="name" class="text-sm font-semibold">{{ __('ui.contact.name') }} <span class="text-red-700" title="{{ __('ui.contact.required') }}">*</span></label>
                        <input class="field" type="text" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" @error('name') aria-invalid="true" aria-describedby="name-error" @enderror>
                        @error('name')<p id="name-error" class="field-error">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label for="email" class="text-sm font-semibold">{{ __('ui.contact.email') }} <span class="text-red-700" title="{{ __('ui.contact.required') }}">*</span></label>
                        <input class="field" type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" @error('email') aria-invalid="true" aria-describedby="email-error" @enderror>
                        @error('email')<p id="email-error" class="field-error">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label for="company" class="text-sm font-semibold">{{ __('ui.contact.company') }} <span class="font-normal text-muted">({{ __('ui.contact.optional') }})</span></label>
                        <input class="field" type="text" id="company" name="company" value="{{ old('company') }}" autocomplete="organization">
                        @error('company')<p class="field-error">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label for="phone" class="text-sm font-semibold">{{ __('ui.contact.phone') }} <span class="font-normal text-muted">({{ __('ui.contact.optional') }})</span></label>
                        <input class="field" type="tel" id="phone" name="phone" value="{{ old('phone') }}" autocomplete="tel">
                        @error('phone')<p class="field-error">{{ $message }}</p>@enderror
                    </div>

                    <div class="sm:col-span-2">
                        <label for="message" class="text-sm font-semibold">{{ __('ui.contact.message') }} <span class="font-normal text-muted">({{ __('ui.contact.optional') }})</span></label>
                        <textarea class="field" id="message" name="message" rows="5">{{ old('message') }}</textarea>
                        @error('message')<p class="field-error">{{ $message }}</p>@enderror
                    </div>

                    <div class="sm:col-span-2">
                        <label for="attachment" class="text-sm font-semibold">{{ __('ui.contact.attachment') }} <span class="font-normal text-muted">({{ __('ui.contact.optional') }})</span></label>
                        <input class="field file:mr-4 file:rounded-full file:border-0 file:bg-ice-200 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-navy-900" type="file" id="attachment" name="attachment" accept=".png,.jpg,.jpeg,.pdf">
                        <p class="mt-1.5 text-xs text-muted">{{ __('ui.contact.attachment_hint') }}</p>
                        @error('attachment')<p class="field-error">{{ $message }}</p>@enderror
                    </div>

                    <div class="sm:col-span-2">
                        <button type="submit" class="btn btn-primary">{{ __('ui.contact.submit') }} <span aria-hidden="true">→</span></button>
                    </div>
                </form>
            </div>

            <aside class="h-fit rounded-3xl bg-navy-900 p-8 text-white">
                <h2 class="text-xl font-bold !text-white">{{ __('ui.contact.info_title') }}</h2>
                <dl class="mt-6 space-y-6 text-sm">
                    <div>
                        <dt class="text-xs font-semibold uppercase tracking-widest text-ice-400">{{ __('ui.contact.email_label') }}</dt>
                        <dd class="mt-1"><a href="mailto:{{ config('site.contact.email') }}" class="hover:underline">{{ config('site.contact.email') }}</a></dd>
                    </div>
                    <div>
                        <dt class="text-xs font-semibold uppercase tracking-widest text-ice-400">{{ __('ui.contact.phone_label') }}</dt>
                        <dd class="mt-1"><a href="tel:{{ preg_replace('/\s+/', '', config('site.contact.phone')) }}" class="hover:underline">{{ config('site.contact.phone') }}</a></dd>
                    </div>
                    <div>
                        <dt class="text-xs font-semibold uppercase tracking-widest text-ice-400">{{ __('ui.contact.address_label') }}</dt>
                        <dd class="mt-1">{{ config('site.contact.address') }}</dd>
                    </div>
                </dl>
            </aside>
        </div>
    </section>
</x-layouts.app>
