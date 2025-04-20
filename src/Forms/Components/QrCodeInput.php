<?php

namespace JeffersonGoncalves\Filament\QrCodeField\Forms\Components;

use Filament\Forms\Components\TextInput;

class QrCodeInput extends TextInput
{
    protected string $view = 'filament-qrcode-field::components.qrcode-input';

    protected function setUp(): void
    {
        parent::setUp();

        $this->placeholder('Enter '.strtolower($this->getLabel()).'...');
    }

    public function icon(string $icon): static
    {
        return $this->extraAttributes(['icon' => $icon]);
    }
}
