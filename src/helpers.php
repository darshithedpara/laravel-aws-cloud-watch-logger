<?php
if (!function_exists('laravelAwsCloudWatchLogger')) {
    /**
     * Access laravelAwsCloudwatchLogger through helper.
     * @return Darshithedpara\LaravelAwsCloudWatchLogger\LaravelAwsCloudWatchLogger
     */
    function laravelAwsCloudwatchLogger()
    {
        return app('laravel-aws-cloud-watch-logger');
    }
}
