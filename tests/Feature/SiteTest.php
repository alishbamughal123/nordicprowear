<?php

namespace Tests\Feature;

use App\Mail\QuoteRequested;
use App\Models\QuoteRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class SiteTest extends TestCase
{
    use RefreshDatabase;

    public function test_site_defaults_to_norwegian(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('lang="nb"', false)
            ->assertSee('Arbeidsklær som leverer på kvalitet og uttrykk');
    }

    public function test_english_is_served_under_prefix(): void
    {
        $this->get('/en')
            ->assertOk()
            ->assertSee('lang="en"', false)
            ->assertSee('Workwear that delivers in quality and expression');
    }

    public function test_language_switcher_links_to_equivalent_page(): void
    {
        $this->get('/kontakt-oss')->assertSee(url('/en/contact-us'), false);
        $this->get('/en/products/apron-goteborg')->assertSee(url('/produkter/apron-goteborg'), false);
    }

    public function test_every_page_renders_in_both_locales(): void
    {
        $paths = ['', 'kolleksjoner', 'produkter', 'produkter/apron-goteborg', 'sertifiseringer', 'om-oss', 'kundeservice', 'faq', 'kontakt-oss',
            'en', 'en/collections', 'en/products', 'en/products/chef-hat-malmo', 'en/certifications', 'en/about-us', 'en/customer-service', 'en/faq', 'en/contact-us'];

        foreach ($paths as $path) {
            $this->get("/$path")->assertOk();
        }
    }

    public function test_unknown_product_is_404(): void
    {
        $this->get('/produkter/does-not-exist')->assertNotFound();
    }

    public function test_products_can_be_filtered_by_collection(): void
    {
        $this->get('/produkter?collection=health')
            ->assertSee('Care Tunic Bergen')
            ->assertDontSee('Apron Göteborg');
    }

    public function test_quote_request_is_stored_and_mailed(): void
    {
        Mail::fake();
        Storage::fake('local');

        $this->post('/kontakt-oss', [
            'name' => 'Kari Nordmann',
            'email' => 'kari@example.no',
            'company' => 'Fjord Hotell',
            'attachment' => UploadedFile::fake()->image('logo.png'),
        ])->assertRedirect()->assertSessionHas('status');

        $quote = QuoteRequest::firstOrFail();
        $this->assertSame('no', $quote->locale);
        Storage::disk('local')->assertExists($quote->attachment_path);
        Mail::assertSent(QuoteRequested::class);
    }

    public function test_quote_validation_messages_are_localised(): void
    {
        $this->post('/kontakt-oss', [])->assertSessionHasErrors(['name', 'email']);
        $this->assertStringContainsString('påkrevd', session('errors')->first('name'));

        $this->post('/en/contact-us', [])->assertSessionHasErrors(['name', 'email']);
        $this->assertStringContainsString('required', session('errors')->first('name'));
    }

    public function test_honeypot_blocks_bots(): void
    {
        $this->post('/kontakt-oss', ['name' => 'Bot', 'email' => 'bot@example.com', 'website' => 'http://spam'])
            ->assertSessionHasErrors('website');

        $this->assertDatabaseCount('quote_requests', 0);
    }

    public function test_invalid_attachment_type_is_rejected(): void
    {
        $this->post('/kontakt-oss', [
            'name' => 'Kari', 'email' => 'kari@example.no',
            'attachment' => UploadedFile::fake()->create('virus.exe', 10),
        ])->assertSessionHasErrors('attachment');
    }
}
