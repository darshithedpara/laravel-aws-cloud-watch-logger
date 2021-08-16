<?php

namespace Darshithedpara\LaravelAwsCloudWatchLogger\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Darshithedpara\LaravelAwsCloudwatchLogger\LaravelAwsCloudwatchLoggerServiceProvider;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelAwsCloudWatchLoggerServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');
    }
}
