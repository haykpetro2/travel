<?php

return [

    'supportedLocales' => [
        'en' => ['name' => 'Eng', 'script' => 'Latn', 'native' => 'English', 'regional' => 'en_GB'],
        'ru' => ['name' => 'Рус', 'script' => 'Cyrl', 'native' => 'Русский', 'regional' => 'ru_RU'],
    ],

    'useAcceptLanguageHeader' => true,
    'hideDefaultLocaleInURL' => true,
    'localesOrder' => [],
    'localesMapping' => [],
    'utf8suffix' => env('LARAVELLOCALIZATION_UTF8SUFFIX', '.UTF-8'),
    'urlsIgnored' => ['/skipped'],

];
