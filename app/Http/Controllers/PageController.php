<?php

namespace App\Http\Controllers;

use App\Support\Catalog;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        return view('pages.home', [
            'collections' => Catalog::collections(),
            'bestsellers' => Catalog::bestsellers(),
        ]);
    }

    public function collections(): View
    {
        return view('pages.collections', ['collections' => Catalog::collections()]);
    }

    public function products(Request $request): View
    {
        $collections = Catalog::collections();
        $active = $request->query('collection');
        $active = $collections->has($active) ? $active : null;

        return view('pages.products', [
            'collections' => $collections,
            'active' => $active,
            'products' => Catalog::products($active),
        ]);
    }

    public function product(string $slug): View
    {
        $product = Catalog::find($slug);
        abort_unless($product, 404);

        return view('pages.product', [
            'product' => $product,
            'related' => Catalog::related($product),
        ]);
    }

    public function certifications(): View
    {
        return view('pages.certifications');
    }

    public function about(): View
    {
        return view('pages.about');
    }

    public function support(): View
    {
        return view('pages.support');
    }

    public function faq(): View
    {
        return view('pages.faq');
    }
}
