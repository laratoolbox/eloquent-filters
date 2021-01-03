<?php

namespace LaraToolbox\EloquentFilters;

use Illuminate\Support\ServiceProvider;
use LaraToolbox\EloquentFilters\Commands\MakeFilter;

class PackageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeFilter::class,
            ]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        //
    }
}
