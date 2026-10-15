<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
 * Every page is registered once per locale. Norwegian (default) has no prefix and
 * plain route names; other locales get "/{locale}" and "{locale}." name prefixes.
 * Slugs are translated per locale to keep URLs natural for Norwegian visitors.
 */
$slugs = [
    'no' => [
        'collections' => 'kolleksjoner', 'products' => 'produkter', 'certifications' => 'sertifiseringer',
        'about' => 'om-oss', 'contact' => 'kontakt-oss', 'support' => 'kundeservice', 'faq' => 'faq',
    ],
    'en' => [
        'collections' => 'collections', 'products' => 'products', 'certifications' => 'certifications',
        'about' => 'about-us', 'contact' => 'contact-us', 'support' => 'customer-service', 'faq' => 'faq',
    ],
];

foreach (array_keys(config('site.locales')) as $locale) {
    $isDefault = $locale === default_locale();
    $s = $slugs[$locale];

    Route::prefix($isDefault ? '' : $locale)
        ->name($isDefault ? '' : "$locale.")
        ->group(function () use ($s) {
            Route::get('/', [PageController::class, 'home'])->name('home');
            Route::get($s['collections'], [PageController::class, 'collections'])->name('collections');
            Route::get($s['products'], [PageController::class, 'products'])->name('products');
            Route::get($s['products'].'/{slug}', [PageController::class, 'product'])->name('product.show');
            Route::get($s['certifications'], [PageController::class, 'certifications'])->name('certifications');
            Route::get($s['about'], [PageController::class, 'about'])->name('about');
            Route::get($s['support'], [PageController::class, 'support'])->name('support');
            Route::get($s['faq'], [PageController::class, 'faq'])->name('faq');
            Route::get($s['contact'], [ContactController::class, 'create'])->name('contact');
            Route::post($s['contact'], [ContactController::class, 'store'])
                ->middleware('throttle:5,1')
                ->name('contact.store');
        });
}
