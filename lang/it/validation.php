<?php

return [

    'accepted' => ':attribute deve essere accettato.',
    'accepted_if' => ':attribute deve essere accettato quando :other è uguale a :value.',
    'active_url' => ':attribute non è un URL valido.',
    'after' => ':attribute deve essere una data successiva a :date.',
    'after_or_equal' => ':attribute deve essere una data successiva o uguale a :date.',
    'alpha' => ':attribute must only contain letters.',
    'alpha_dash' => ':attribute deve contenere solo lettere, numeri, trattini e sottolineature.',
    'alpha_num' => ':attribute deve contenere solo lettere e numeri.',
    'array' => ':attribute deve essere un array.',
    'before' => ':attribute deve essere una data prima di :date.',
    'before_or_equal' => ':attribute deve essere una data precedente o uguale a :date.',
    'between' => [
        'array' => ':attribute deve avere tra :min e :max elementi.',
        'file' => ':attribute deve essere tra :min e :max kilobyte.',
        'numeric' => ':attribute deve essere tra :min e :max.',
        'string' => ':attribute deve essere tra :min and :max caratteri.',
    ],
    'boolean' => ':attribute deve essere vero o falso.',
    'confirmed' => ':attribute di conferma non corrisponde.',
    'current_password' => 'La password non è corretta.',
    'date' => ':attribute non è una data valida.',
    'date_equals' => ':attribute deve essere una data uguale a :date.',
    'date_format' => ':attribute non corrisponde al formato :format.',
    'declined' => ':attribute deve essere rifiutato.',
    'declined_if' => ':attribute deve essere rifiutato quando :other è :value.',
    'different' => ':attribute e :other devono essere differenti.',
    'digits' => ':attribute deve essere di :digits cifre.',
    'digits_between' => ':attribute deve essere tra :min e :max cifre.',
    'dimensions' => ':attribute ha dimensioni dell\'immagine non valide.',
    'distinct' => ':attribute ha un valore doppio.',
    'email' => 'Il campo :attribute deve essere un\'indirizzo email valido.',
    'ends_with' => ':attribute deve finire con uno dei seguenti valori: :values.',
    'enum' => ':attribute selezionato non è valido.',
    'exists' => ':attribute selezionato non è valido.',
    'file' => ':attribute deve essere un file.',
    'filled' => ':attribute deve essere riempito.',
    'gt' => [
        'array' => ':attribute deve avere più di :value elementi.',
        'file' => ':attribute deve essere maggiore di :value kilobyte.',
        'numeric' => ':attribute deve essere maggiore di :value.',
        'string' => ':attribute deve essere maggiore di :value caratteri.',
    ],
    'gte' => [
        'array' => ':attribute deve avere :value elementi o più.',
        'file' => ':attribute deve essere maggiore o uguale a :value kilobyte.',
        'numeric' => ':attribute deve essere maggiore o uguale a :value.',
        'string' => ':attribute deve essere maggiore o uguale a :value caratteri.',
    ],
    'image' => ':attribute deve essere un\'immagine.',
    'in' => ':attribute selezionato non è valido.',
    'in_array' => ':attribute non esiste in :other.',
    'integer' => ':attribute deve essere un numero intero.',
    'ip' => ':attribute deve essere un\'indirizzo IP valido.',
    'ipv4' => ':attribute deve essere un\'indirizzo IPv4 valido.',
    'ipv6' => ':attribute deve essere un\'indirizzo IPv6 valido.',
    'json' => ':attribute deve essere una stringa JSON valida.',
    'lt' => [
        'array' => ':attribute deve avere meno di :value elementi.',
        'file' => ':attribute deve avere meno di :value kilobyte.',
        'numeric' => ':attribute deve avere meno di :value.',
        'string' => ':attribute deve avere meno di :value caratteri.',
    ],
    'lte' => [
        'array' => ':attribute non deve avere più di :value elementi.',
        'file' => ':attribute deve essere minore o uguale a :value kilobyte.',
        'numeric' => ':attribute deve essere minore o uguale a :value.',
        'string' => ':attribute deve essere minore o uguale a :value caratteri.',
    ],
    'mac_address' => ':attribute deve essere un\'indirizzo MAC valido.',
    'max' => [
        'array' => ':attribute non deve avere più di :max items.',
        'file' => ':attribute non deve essere maggiore di :max kilobyte.',
        'numeric' => ':attribute non deve essere maggiore di :max.',
        'string' => ':attribute non deve essere maggiore di :max caratteri.',
    ],
    'mimes' => ':attribute deve essere un file di tipo: :values.',
    'mimetypes' => ':attribute deve essere un file di tipo: :values.',
    'min' => [
        'array' => ':attribute deve avere almeno :min elementi.',
        'file' => ':attribute deve essere almeno :min kilobyte.',
        'numeric' => ':attribute deve essere almeno :min.',
        'string' => ':attribute deve essere almeno :min caratteri.',
    ],
    'multiple_of' => ':attribute deve essere un multiplo di :value.',
    'not_in' => ':attribute selezionato non è valido.',
    'not_regex' => 'Il formato di :attribute non è valido.',
    'numeric' => ':attribute deve essere un numero.',
    'password' => 'La password non è corretta.',
    'present' => ':attribute deve essere presente.',
    'prohibited' => ':attribute è proibito.',
    'prohibited_if' => ':attribute è proibito quando :other è :value.',
    'prohibited_unless' => ':attribute è proibito a meno che :other is in :values.',
    'prohibits' => ':attribute proibisce :other dall\'essere presente.',
    'regex' => 'Il formato di :attribute non è valido.',
    'required' => ':attribute è obbligatorio.',
    'required_array_keys' => ':attribute deve contenere voci per: :values.',
    'required_if' => ':attribute è obbligatorio quando :other è :value.',
    'required_unless' => ':attribute è obbligatorio a meno che :other è in :values.',
    'required_with' => ':attribute è obbligatorio quando :values è presente.',
    'required_with_all' => ':attribute è obbligatorio quando :values sono presenti.',
    'required_without' => ':attribute è obbligatorio quando :values non è presente.',
    'required_without_all' => ':attribute è obbligatorio quando nessun :values sono prensenti.',
    'same' => ':attribute e :other devono combaciare.',
    'size' => [
        'array' => ':attribute deve contenere :size elementi.',
        'file' => ':attribute deve essere :size kilobyte.',
        'numeric' => ':attribute deve essere :size.',
        'string' => ':attribute deve essere :size caretteri.',
    ],
    'starts_with' => ':attribute deve cominciare con uno dei seguenti: :values.',
    'string' => ':attribute deve essere una stringa di testo.',
    'timezone' => ':attribute deve essere un fuso orario valido.',
    'unique' => ':attribute è già stato preso.',
    'uploaded' => 'Il caricamento di :attribute è fallito.',
    'url' => ':attribute deve essere un URL valido.',
    'uuid' => ':attribute deve essere un UUID valido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => trans('fields'),

];
