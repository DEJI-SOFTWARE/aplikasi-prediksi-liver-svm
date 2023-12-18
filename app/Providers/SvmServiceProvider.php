<?php

namespace App\Providers;

use App\Service\SVMService;
use Illuminate\Support\ServiceProvider;
use \SVM;

class SvmServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {

        $this->app->singleton(SVM::class, function ($app) {
            return new SVM();
        });
        $this->app->singleton(SVMService::class, function ($app) {
            return new SVMService($app->make(SVM::class));
        });

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
