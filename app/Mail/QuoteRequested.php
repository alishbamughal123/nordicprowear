<?php

namespace App\Mail;

use App\Models\QuoteRequest;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;

class QuoteRequested extends Mailable
{
    public function __construct(public QuoteRequest $quote) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            replyTo: [new Address($this->quote->email, $this->quote->name)],
            subject: 'Ny tilbudsforespørsel: '.($this->quote->company ?: $this->quote->name),
        );
    }

    public function content(): Content
    {
        return new Content(markdown: 'mail.quote-requested');
    }

    public function attachments(): array
    {
        return $this->quote->attachment_path
            ? [Attachment::fromStorageDisk('local', $this->quote->attachment_path)]
            : [];
    }
}
