<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuoteRequest;
use App\Mail\QuoteRequested;
use App\Models\QuoteRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function create(): View
    {
        return view('pages.contact');
    }

    public function store(StoreQuoteRequest $request): RedirectResponse
    {
        $data = $request->safe()->except('attachment');

        if ($request->hasFile('attachment')) {
            $data['attachment_path'] = $request->file('attachment')->store('quote-attachments');
        }

        $quote = QuoteRequest::create($data + ['locale' => app()->getLocale()]);

        Mail::to(config('site.contact.email'))->send(new QuoteRequested($quote));

        return redirect(lroute('contact').'#form')->with('status', __('contact.success'));
    }
}
