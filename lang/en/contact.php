<?php

return [
    'success' => 'Thank you! We have received your enquiry and will be in touch as soon as possible.',
    'attributes' => [
        'name' => 'name',
        'email' => 'email',
        'company' => 'company',
        'phone' => 'phone',
        'message' => 'message',
        'attachment' => 'attachment',
    ],
    'validation' => [
        'required' => 'The :attribute field is required.',
        'email' => 'Please enter a valid email address.',
        'max.string' => 'The :attribute may not be longer than :max characters.',
        'max.file' => 'The file may not be larger than 5 MB.',
        'mimes' => 'The file must be a PNG, JPG or PDF.',
        'uploaded' => 'The upload failed. Try again with a file of max 5 MB.',
        'prohibited' => 'The request was rejected.',
    ],
];
