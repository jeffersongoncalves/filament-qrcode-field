<?php

namespace JeffersonGoncalves\Filament\QrCodeField;

use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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

    protected function getAssetPackageName(): ?string
    {
        return 'jeffersongoncalves/filament-qrcode-field';
    }

    protected function getAssets(): array
    {
        return [
            Css::make('filament-qrcode-field-styles', __DIR__.'/../resources/dist/filament-qrcode-field.css'),
        ];
    }
}
