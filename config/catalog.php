<?php

/*
 * Static catalogue. Translated names/descriptions live in lang/{locale}/catalog.php
 * under the same slug. Swap the image paths when real photography is available.
 */
return [
    'collections' => [
        'health' => ['image' => 'images/photos/collection-health.jpg'],
        'kitchen' => ['image' => 'images/photos/collection-kitchen.jpg'],
        'workwear' => ['image' => 'images/photos/collection-workwear.jpg'],
        'hotel' => ['image' => 'images/photos/collection-hotel.jpg'],
    ],

    'products' => [
        'apron-goteborg' => ['collection' => 'kitchen', 'bestseller' => true],
        'apron-kobenhavn' => ['collection' => 'kitchen', 'bestseller' => true],
        'chef-hat-aarhus' => ['collection' => 'kitchen', 'bestseller' => true],
        'chef-hat-malmo' => ['collection' => 'kitchen', 'bestseller' => true],
        'chef-jacket-boras' => ['collection' => 'kitchen', 'bestseller' => false],
        'service-trouser-helsinki' => ['collection' => 'hotel', 'bestseller' => true],
        'care-tunic-bergen' => ['collection' => 'health', 'bestseller' => false],
        'work-jacket-stavanger' => ['collection' => 'workwear', 'bestseller' => false],
        'reception-blazer-trondheim' => ['collection' => 'hotel', 'bestseller' => false],
        'cargo-trouser-tromso' => ['collection' => 'workwear', 'bestseller' => false],
    ],
];
