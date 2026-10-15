<x-mail::message>
# Ny tilbudsforespørsel

**Navn:** {{ $quote->name }}
**E-post:** {{ $quote->email }}
**Firma:** {{ $quote->company ?: '–' }}
**Telefon:** {{ $quote->phone ?: '–' }}
**Språk:** {{ strtoupper($quote->locale) }}

{{ $quote->message ?: 'Ingen melding.' }}
</x-mail::message>
