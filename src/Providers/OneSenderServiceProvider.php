<?php

namespace Henset11\OneSender\Providers;

use Illuminate\Support\ServiceProvider;
use Henset11\OneSender\OneSenderService;

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
