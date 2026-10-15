<?php

return [
    'name' => 'NORDICPROWEAR',

    // First entry is the default locale and is served without a URL prefix.
    'locales' => [
        'no' => ['label' => 'Norsk', 'short' => 'NO', 'html' => 'nb', 'og' => 'nb_NO'],
        'en' => ['label' => 'English', 'short' => 'EN', 'html' => 'en', 'og' => 'en_GB'],
    ],

    'contact' => [
        'email' => env('SITE_CONTACT_EMAIL', 'kundeservice@nordicprowear.no'),
        'phone' => env('SITE_CONTACT_PHONE', '+47 999 00 000'),
        'address' => env('SITE_CONTACT_ADDRESS', 'Oslo, Norge'),
    ],

    'certifications_pdf' => 'https://nordicprowear.no/wp-content/uploads/2025/11/content-1.pdf',
];
