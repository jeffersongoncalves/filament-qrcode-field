<?php

use Illuminate\Support\Facades\Blade;
use JeffersonGoncalves\Filament\QrCodeField\Forms\Components\QrCodeInput;

it('loads every class it ships', function (string $class) {
    expect(class_exists($class) || interface_exists($class) || trait_exists($class))->toBeTrue();
})->with([
    ['JeffersonGoncalves\\Filament\\QrCodeField\\Forms\\Components\\QrCodeInput'],
    ['JeffersonGoncalves\\Filament\\QrCodeField\\QrCodeFieldServiceProvider'],
]);

it('compiles every Blade view it ships', function (string $file) {
    expect(Blade::compileString((string) file_get_contents(__DIR__.'/../../'.$file)))->toBeString();
})->with([
    ['resources/views/components/qrcode-input.blade.php'],
]);

it('builds QrCodeInput', function () {
    expect(QrCodeInput::make('subject')->getName())->toBe('subject');
});
