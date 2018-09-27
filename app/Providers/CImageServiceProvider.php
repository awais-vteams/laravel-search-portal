<?php

namespace App\Providers;

use App\Services\CImageService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class CImageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton( CImageService::class, function () {
            return new CImageService();
        });
        View::share('CImage', app('App\Services\CImageService'));
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->alias(CImageService::class, 'cimage');
    }
}
