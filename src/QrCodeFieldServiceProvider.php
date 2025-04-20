<?php

namespace JeffersonGoncalves\Filament\QrCodeField;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class QrCodeFieldServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-qrcode-field')
            ->hasViews();
    }
}
