## Filament QrCode Field

A Filament form component that provides QR Code scanning and input functionality using the html5-qrcode library. Extends TextInput with a camera-based QR code reader modal.

### Installation

@verbatim
<code-snippet name="Install the plugin" lang="bash">
composer require jeffersongoncalves/filament-qrcode-field:"^3.0"
</code-snippet>
@endverbatim

### Publish Config (Optional)

@verbatim
<code-snippet name="Publish configuration" lang="bash">
php artisan vendor:publish --tag="filament-qrcode-field-config"
</code-snippet>
@endverbatim

### Usage

@verbatim
<code-snippet name="Use QrCodeInput in a form" lang="php">
use JeffersonGoncalves\Filament\QrCodeField\Forms\Components\QrCodeInput;

QrCodeInput::make('qrcode')
    ->required(),
</code-snippet>
@endverbatim

### Features
- QR code scanning via device camera using html5-qrcode library
- Extends Filament's TextInput component
- Configurable scanner dimensions (fps, width, height)
- Configurable modal width
- Custom icon support via `->icon()` method
- Multi-language support (17+ languages)
- Automatic placeholder text based on field label

### Configuration Options
- `asset_js` - URL for the html5-qrcode JavaScript library
- `modal.width` - Width of the scanner modal (uses Filament Width enum)
- `reader.width` / `reader.height` - QR code reader dimensions
- `scanner.fps` - Scanner frames per second
- `scanner.width` / `scanner.height` - Scanner viewport dimensions

### Best Practices
- This is a standalone form component, not a panel plugin (no plugin registration needed)
- Use `->required()` when the QR code value is mandatory
- Customize scanner dimensions in config for optimal camera performance
- Publish translations to customize field labels and placeholders
