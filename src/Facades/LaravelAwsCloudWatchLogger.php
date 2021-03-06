<?php

namespace Darshithedpara\LaravelAwsCloudWatchLogger\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Darshithedpara\LaravelAwsCloudWatchLogger\LaravelAwsCloudWatchLogger
 */
class LaravelAwsCloudWatchLogger extends Facade
{
    /**
     * Get the registered name of the component.
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-aws-cloud-watch-logger';
    }
}
