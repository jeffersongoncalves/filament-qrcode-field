---
name: filament-qrcode-field-development
description: Build and work with the Filament QrCode Field component, including QR code scanning, form integration, and configuration.
---

# Filament QrCode Field Development

## When to use this skill

Use this skill when:
- Adding QR code scanning functionality to Filament forms
- Configuring the QR code scanner modal, dimensions, or FPS
- Customizing QrCodeInput field behavior (icon, placeholder, validation)
- Troubleshooting camera-based QR code reading issues
- Publishing or modifying translations for the QR code field

## Architecture

This package is a standalone Filament form component (not a panel plugin). It uses:
- `QrCodeFieldServiceProvider` - Registers config, translations, views, and CSS assets
- `QrCodeInput` - The form component class extending `TextInput`
- html5-qrcode JavaScript library for camera-based QR scanning

### Namespace

```
JeffersonGoncalves\Filament\QrCodeField
```

### Key Classes

| Class | Path | Purpose |
|-------|------|---------|
| `QrCodeFieldServiceProvider` | `src/QrCodeFieldServiceProvider.php` | Service provider, registers assets |
| `QrCodeInput` | `src/Forms/Components/QrCodeInput.php` | Form component for QR code input |

## Installation

```bash
composer require jeffersongoncalves/filament-qrcode-field:"^3.0"
```

### Publish Config

```bash
php artisan vendor:publish --tag="filament-qrcode-field-config"
```

### Publish Translations

```bash
php artisan vendor:publish --tag=filament-qrcode-field-translations
```

## Configuration

### Default Config (`config/filament-qrcode-field.php`)

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

## Usage

### Basic QR Code Input

```php
use JeffersonGoncalves\Filament\QrCodeField\Forms\Components\QrCodeInput;

QrCodeInput::make('qrcode')
    ->required(),
```

### With Custom Icon

```php
QrCodeInput::make('qrcode')
    ->icon('heroicon-o-qr-code')
    ->required(),
```

### In a Filament Resource Form

```php
use JeffersonGoncalves\Filament\QrCodeField\Forms\Components\QrCodeInput;

public static function form(Schema $schema): Schema
{
    return $schema
        ->components([
            QrCodeInput::make('barcode')
                ->label('Product Barcode')
                ->required(),
        ]);
}
```

## Component Details

### QrCodeInput Class

`QrCodeInput` extends `Filament\Forms\Components\TextInput` and adds:

```php
namespace JeffersonGoncalves\Filament\QrCodeField\Forms\Components;

use Filament\Forms\Components\TextInput;

class QrCodeInput extends TextInput
{
    protected string $view = 'filament-qrcode-field::components.qrcode-input';

    protected function setUp(): void
    {
        parent::setUp();

        $this->placeholder(fn (QrCodeInput $component): string =>
            __('filament-qrcode-field::qrcode-field.fields.placeholder', [
                'label' => strtolower($component->getLabel())
            ])
        );
    }

    public function icon(string $icon): static
    {
        return $this->extraAttributes(['icon' => $icon]);
    }
}
```

Key points:
- Uses a custom Blade view for the QR scanner modal
- Automatically sets a translated placeholder based on the field label
- The `icon()` method passes the icon name via extra attributes
- All standard TextInput methods are available (required, maxLength, etc.)

### Service Provider

The `QrCodeFieldServiceProvider` registers:
- Config file (`filament-qrcode-field`)
- Translations
- Views
- CSS assets via `FilamentAsset::register()`

```php
class QrCodeFieldServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-qrcode-field')
            ->hasConfigFile()
            ->hasTranslations()
            ->hasViews();
    }

    public function packageBooted(): void
    {
        FilamentAsset::register(
            $this->getAssets(),
            $this->getAssetPackageName()
        );
    }
}
```

## Version Compatibility

| Package Version | Filament Version |
|----------------|------------------|
| 1.x | 3.x |
| 2.x | 4.x |
| 3.x | 5.x |

## Troubleshooting

### QR Scanner Not Opening
**Cause**: The html5-qrcode JavaScript library may not be loaded.
**Solution**: Check that the `asset_js` config value points to a valid CDN URL. Ensure no Content Security Policy blocks external scripts.

### Camera Permission Denied
**Cause**: Browser or device not granting camera access.
**Solution**: Ensure the site is served over HTTPS (required for camera access). Check browser permissions for the site.

### Scanner Too Small or Too Large
**Cause**: Default scanner dimensions do not fit the UI.
**Solution**: Publish the config and adjust `reader.width`, `reader.height`, `scanner.width`, and `scanner.height` values.

### Placeholder Not Showing Correctly
**Cause**: Translation files not published or label not set.
**Solution**: Ensure the field has a `->label()` set, or publish translations with `--tag=filament-qrcode-field-translations`.
