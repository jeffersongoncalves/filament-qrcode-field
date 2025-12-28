<?php

namespace JeffersonGoncalves\Filament\QrCodeField\Forms\Components;

use Filament\Forms\Components\TextInput;

class QrCodeInput extends TextInput
{
    protected string $view = 'filament-qrcode-field::components.qrcode-input';

    protected function setUp(): void
    {
        parent::setUp();

        $this->placeholder(fn (QrCodeInput $component): string => __('filament-qrcode-field::qrcode-field.placeholder', [
            'label' => strtolower($component->getLabel()),
        ]));
    }

    public function icon(string $icon): static
    {
        return $this->extraAttributes(['icon' => $icon]);
    }
}
