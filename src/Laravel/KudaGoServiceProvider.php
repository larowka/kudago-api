<?php

namespace Larowka\KudaGo\Laravel;

use Illuminate\Support\ServiceProvider;
use Larowka\KudaGo\Api;

class KudaGoServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Api::class, function () {
            return new Api();
        });
        $this->app->alias(Api::class, 'kudago');
    }
}
