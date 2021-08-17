<?php

namespace Darshithedpara\LaravelAwsCloudWatchLogger\Drivers;

use Darshithedpara\LaravelAwsCloudWatchLogger\Contracts\Driver;
use Illuminate\Database\Eloquent\Model;

/**
 *
 */
class FileDriver extends Driver
{
    protected array $settings;

    public function __construct(array $settings)
    {
        $this->settings = $settings;
    }

    public function dispatch(string $type, string $title)
    {
        $data2 = $this->preparePayload();
        dd($data2);
    }
}
