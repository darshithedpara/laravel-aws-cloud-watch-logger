<?php

namespace Darshithedpara\LaravelAwsCloudWatchLogger\Drivers;

use Aws\CloudWatchLogs\CloudWatchLogsClient;
use Darshithedpara\LaravelAwsCloudWatchLogger\Contracts\Driver;
use Illuminate\Database\Eloquent\Model;
use Maxbanton\Cwh\Handler\CloudWatch;
use Monolog\Logger;

class CloudWatchDriver extends Driver
{

    protected array $settings;

    public function __construct(array $settings)
    {
        $this->settings = $settings;
    }

    /**
     * @return false|Logger
     */
    protected function getLogger(){
        try {
            $client = new CloudWatchLogsClient($this->settings['credential']);
            $handler = new CloudWatch($client, $this->settings['log_group'], $this->settings['log_stream'], $this->settings['retention'], $this->settings['batch_size'], $this->tags, $this->settings['log_level']);
            $logger = new Logger($this->settings['project_name']);
            $logger->pushHandler($handler);
            return $logger;
        }
        catch (\Exception $e) {
            return false;
        }
    }

    /**
     * @return false|void
     */
    public function dispatch(string $type, string $title)
    {
        try {
            $this->getLogger()->$$type($title);
        }
        catch (\Exception $e) {
            return false;
        }
    }
}
