<?php

namespace JeffersonGoncalves\Filament\QrCodeField;

use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class QrCodeFieldServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-qrcode-field')
            ->hasViews()
            ->hasAssets();
    }

    public function packageBooted(): void
    {
        $assets = [
            Js::make('filament-qrcode-field-js', __DIR__.'/../resources/dist/qrcode-scanner.js')->loadedOnRequest(),
        ];

        FilamentAsset::register($assets, 'jeffersongoncalves/filament-qrcode-field');
    }
}
