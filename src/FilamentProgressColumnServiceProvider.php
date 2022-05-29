<?php

namespace RyanChandler\FilamentProgressColumn;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;

class FilamentProgressColumnServiceProvider extends PluginServiceProvider
{
    public static string $name = 'filament-progress-column';

    protected array $styles = [
        'progress-column' => __DIR__ . '/../resources/dist/progress.css'
    ];

    public function packageConfigured(Package $package): void
    {
        $package->hasAssets();
    }
}
