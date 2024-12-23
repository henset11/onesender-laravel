<?php

namespace Henset11\OneSenderLaravel\Providers;

use Illuminate\Support\ServiceProvider;
use Henset11\OneSenderLaravel\OneSenderService;

class OneSenderServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/onesender.php', 'onesender');

        $this->app->singleton('onesender', function ($app) {
            return new OneSenderService();
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/onesender.php' => config_path('onesender.php'),
        ], 'onesender-config');
    }
}
