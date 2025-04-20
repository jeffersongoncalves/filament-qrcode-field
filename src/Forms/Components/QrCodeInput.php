<?php

namespace JeffersonGoncalves\Filament\QrCodeField\Forms\Components;

use Filament\Forms\Components\TextInput;

class QrCodeInput extends TextInput
{
    protected string $view = 'filament-qrcode-field::components.qrcode-input';

    protected function setUp(): void
    {
        parent::setUp();

        // Set default properties for the QrCodeInput
        $this->label('QrCode Input')
            ->placeholder('Enter qrcode...')
            ->required();
    }

    public function icon(string $icon): static
    {
        return $this->extraAttributes(['icon' => $icon]);
    }
}
