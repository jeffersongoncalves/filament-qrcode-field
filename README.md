<div class="filament-hidden">

![Filament QrCode Field](https://raw.githubusercontent.com/jeffersongoncalves/filament-qrcode-field/1.x/art/jeffersongoncalves-filament-qrcode-field.png)

</div>

# Filament QrCode Field

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jeffersongoncalves/filament-qrcode-field.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/filament-qrcode-field)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/jeffersongoncalves/filament-qrcode-field/fix-php-code-style-issues.yml?branch=master&label=code%20style&style=flat-square)](https://github.com/jeffersongoncalves/filament-qrcode-field/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3A2.x)
[![Total Downloads](https://img.shields.io/packagist/dt/jeffersongoncalves/filament-qrcode-field.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/filament-qrcode-field)

A Laravel Filament package that provides QR Code field functionality for your web applications. This package extends Filament v4 with a simple QR code input component.

## Compatibility

| Package Version                                                             | Filament Version |
|-----------------------------------------------------------------------------|------------------|
| [1.x](https://github.com/jeffersongoncalves/filament-qrcode-field/tree/1.x) | 3.x              |
| [2.x](https://github.com/jeffersongoncalves/filament-qrcode-field/tree/2.x) | 4.x              |
| [3.x](https://github.com/jeffersongoncalves/filament-qrcode-field/tree/3.x) | 5.x              |

## Requirements

- PHP 8.2 or higher
- Filament 4.0

## Installation

You can install the package via composer:

```bash
composer require jeffersongoncalves/filament-qrcode-field:^2.0
```

Optionally, you can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-qrcode-field-config"
```

## Usage

Once installed, you can use the QrCodeInput component in your Filament forms:

```php
use JeffersonGoncalves\Filament\QrCodeField\Forms\Components\QrCodeInput;

// In your form definition
QrCodeInput::make('qrcode')
    ->required(),
```

This is the content of the default config file:

```php
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
```

## Translations

This package supports multiple languages. The following languages are currently available:

- Arabic (`ar`)
- Czech (`cs`)
- German (`de`)
- English (`en`)
- Spanish (`es`)
- Persian (`fa`)
- French (`fr`)
- Hebrew (`he`)
- Indonesian (`id`)
- Italian (`it`)
- Japanese (`ja`)
- Dutch (`nl`)
- Polish (`pl`)
- Portuguese (`pt`)
- Portuguese (Brazil) (`pt_BR`)
- Portuguese (Portugal) (`pt_PT`)
- Slovak (`sk`)
- Turkish (`tr`)

If you want to customize the translations, you can publish the language files:

```bash
php artisan vendor:publish --tag=filament-qrcode-field-translations
```

## Development

You can run code analysis and formatting using the following commands:

```bash
# Run static analysis
composer analyse

# Format code
composer format
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Jèfferson Gonçalves](https://github.com/jeffersongoncalves)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
