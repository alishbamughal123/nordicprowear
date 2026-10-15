<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuoteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email:rfc', 'max:190'],
            'company' => ['nullable', 'string', 'max:150'],
            'phone' => ['nullable', 'string', 'max:40'],
            'message' => ['nullable', 'string', 'max:4000'],
            'attachment' => ['nullable', 'file', 'mimes:png,jpg,jpeg,pdf', 'max:5120'],
            // Honeypot: real visitors never see or fill this field.
            'website' => ['prohibited'],
        ];
    }

    public function messages(): array
    {
        return trans('contact.validation');
    }

    public function attributes(): array
    {
        return trans('contact.attributes');
    }
}
