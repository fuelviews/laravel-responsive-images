<?php

namespace Fuelviews\ResponsiveImages;

use Fuelviews\ResponsiveImages\View\Components\ResponsiveImages;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class ResponsiveImagesServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/responsive-images.php' => config_path('responsive-images.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/../resources/views/components' => resource_path('views/vendor/responsive-images'),
        ], 'views');

        $this->publishes([
            __DIR__.'/../tests' => base_path('tests/Feature/'),
        ], 'tests');        

        $this->loadViewsFrom(__DIR__.'/../resources/views/components', 'fuelviews');

        Blade::component('fuelviews::responsive-images', ResponsiveImages::class);
    }
}
