<?php

namespace LaraToolbox\EloquentFilters;

use Illuminate\Support\ServiceProvider;
use LaraToolbox\EloquentFilters\Commands\MakeFilterCommand;

class PackageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeFilterCommand::class,
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
