<?php

namespace Darshithedpara\LaravelAwsCloudWatchLogger\Contracts;

use Darshithedpara\LaravelAwsCloudWatchLogger\Types\Modules;
use Darshithedpara\LaravelAwsCloudWatchLogger\Types\Operations;
use Exception;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Driver
 * @package Darshithedpara\LaravelAwsCloudWatchLogger\Contracts
 */
abstract class Driver
{
    protected array $config;

    protected array $settings;

    protected string $driver;

    protected array $tags;

    protected string $title;

    protected array $data;

    protected Model $store;

    protected string $operation;

    protected string $module;

    /**
     * Driver constructor.
     * @param array $settings
     */
    abstract public function __construct(array $settings);

    public function setTags(array $tags){
        $this->tags = $tags;
    }

    public function setTitle(string $title){
        $this->title = $title;
    }
    public function setData(array $data){
        $this->data = $data;
    }

    public function setStore(Model $store){
        $this->store = $store;
    }

    public function setModule($module){
        $this->module = $module;
    }

    public function setOperation(string $operation){
        $this->operation = $operation;
    }

    /**
     * @return array
     */
    public function preparePayload(): array
    {
        return [
            "project"   => $this->settings['project_name'],
            "storeId"   => $this->store->id,
            "storeSlug" => $this->store->store_slug,
            "module"    => $this->module,
            "operation" => $this->operation,
            "date"      => \Carbon\Carbon::now()->format('d-m-Y'),
            "time"      => \Carbon\Carbon::now()->format('H:i:s'),
            "payload"   => [
                "data"   => $this->data,
                "before" => [],
                "after"  => [],
                "extra"  => [
                    'ipAddress'  => request()->getClientIp(),
                    'browser'    => request()->header('User-Agent'),
                    //                'origin'=>request()->headers->get('origin'),
                    'host'       => request()->server('HTTP_HOST'),
                    'currentUrl' => request()->getRequestUri(),
                    'protocal'   => request()->server('SERVER_PROTOCOL'),
                ]
            ]
        ];
    }

    abstract public function dispatch(string $type, string $title);
}
