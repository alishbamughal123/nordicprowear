<?php

namespace App\Support;

use Illuminate\Support\Collection;

class Catalog
{
    /** @return Collection<string, array<string, mixed>> keyed by collection slug */
    public static function collections(): Collection
    {
        return collect(config('catalog.collections'))->map(fn (array $c, string $slug) => [
            'slug' => $slug,
            'image' => asset($c['image']),
            'name' => __("catalog.collections.$slug.name"),
            'description' => __("catalog.collections.$slug.description"),
        ]);
    }

    /** @return Collection<string, array<string, mixed>> keyed by product slug */
    public static function products(?string $collection = null): Collection
    {
        return collect(config('catalog.products'))
            ->when($collection, fn (Collection $p) => $p->where('collection', $collection))
            ->map(fn (array $p, string $slug) => self::hydrate($slug, $p));
    }

    public static function bestsellers(): Collection
    {
        return self::products()->where('bestseller', true);
    }

    public static function find(string $slug): ?array
    {
        $product = config("catalog.products.$slug");

        return $product ? self::hydrate($slug, $product) : null;
    }

    public static function related(array $product, int $limit = 3): Collection
    {
        return self::products($product['collection'])
            ->reject(fn (array $p) => $p['slug'] === $product['slug'])
            ->take($limit);
    }

    private static function hydrate(string $slug, array $product): array
    {
        return $product + [
            'slug' => $slug,
            'image' => asset("images/photos/$slug.jpg"),
            'name' => __("catalog.products.$slug.name"),
            'description' => __("catalog.products.$slug.description"),
            'details' => __("catalog.products.$slug.details"),
            'collection_name' => __("catalog.collections.{$product['collection']}.name"),
        ];
    }
}
