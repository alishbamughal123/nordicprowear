<?php

return [
    'success' => 'Takk! Vi har mottatt forespørselen din og tar kontakt så snart som mulig.',
    'attributes' => [
        'name' => 'navn',
        'email' => 'e-post',
        'company' => 'firma',
        'phone' => 'telefon',
        'message' => 'melding',
        'attachment' => 'vedlegg',
    ],
    'validation' => [
        'required' => 'Feltet :attribute er påkrevd.',
        'email' => 'Oppgi en gyldig e-postadresse.',
        'max.string' => 'Feltet :attribute kan ikke være lengre enn :max tegn.',
        'max.file' => 'Filen kan ikke være større enn 5 MB.',
        'mimes' => 'Filen må være av typen PNG, JPG eller PDF.',
        'uploaded' => 'Opplastingen mislyktes. Prøv igjen med en fil på maks 5 MB.',
        'prohibited' => 'Forespørselen ble avvist.',
    ],
];
