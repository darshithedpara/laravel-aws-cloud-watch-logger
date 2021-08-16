<?php

namespace Darshithedpara\LaravelAwsCloudWatchLogger;

use Illuminate\Support\ServiceProvider;

class LaravelAwsCloudWatchLoggerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('laravel-aws-cloud-watch-logger.php'),
            ], 'config');

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'laravel-aws-cloud-watch-logger');

        // Register the main class to use with the facade
        $this->app->singleton('laravel-aws-cloud-watch-logger', function () {
            return new LaravelAwsCloudWatchLogger;
        });
    }
}
