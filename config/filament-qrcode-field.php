<?php

use Filament\Support\Enums\Width;

return [
    'asset_js' => 'https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js',
    'modal' => [
        'width' => Width::Large,
    ],
    'reader' => [
        'width' => '600px',
        'height' => '600px',
    ],
    'scanner' => [
        'fps' => 10,
        'width' => 250,
        'height' => 250,
    ],
];
