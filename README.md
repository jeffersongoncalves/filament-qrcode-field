<div class="filament-hidden">

![Filament QrCode Field](https://raw.githubusercontent.com/jeffersongoncalves/filament-qrcode-field/master/art/jeffersongoncalves-filament-qrcode-field.png)

</div>

# Filament QrCode Field

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jeffersongoncalves/filament-qrcode-field.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/filament-qrcode-field)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/jeffersongoncalves/filament-qrcode-field/fix-php-code-style-issues.yml?branch=master&label=code%20style&style=flat-square)](https://github.com/jeffersongoncalves/filament-qrcode-field/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/jeffersongoncalves/filament-qrcode-field.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/filament-qrcode-field)

A Laravel Filament package that provides QR Code field functionality for your web applications. This package extends Filament v3 with a simple QR code input component.

## Installation

You can install the package via composer:

```bash
composer require jeffersongoncalves/filament-qrcode-field
```

## Usage

Once installed, you can use the QrCodeInput component in your Filament forms:

```php
 use JeffersonGoncalves\Filament\QrCodeField\Forms\Components\QrCodeInput;

// In your form definition
QrCodeInput::make('qrcode')
    ->required(),
```

## Testing

```bash
composer test
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
