<?php

namespace Novay\ApiSamarinda;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;;

class ApiSamarindaServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        $this->app->bind('api-samarinda', function() {
            return new ApiSamarinda;
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/api-samarinda.php' => config_path('api-samarinda.php'),
        ], 'api-samarinda');
    }
}
