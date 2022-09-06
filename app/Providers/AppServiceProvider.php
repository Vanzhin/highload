<?php

namespace App\Providers;

use App\Cache\AppMemcached;
use App\Cache\AppMemcachedInterface;
use App\Cache\AppRedis;
use App\Cache\AppRedisInterface;
use App\Handlers\LoggerHandler;
use App\Handlers\LoggerHandlerInterface;
use App\Services\MemcachedService;
use App\Services\MemcachedServiceInterface;
use App\Services\MemcacheService;
use App\Services\MemcacheServiceInterface;
use App\Services\RedisService;
use App\Services\RedisServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(LoggerHandlerInterface::class, LoggerHandler::class);
        $this->app->bind(MemcachedServiceInterface::class, MemcachedService::class);
        $this->app->bind(RedisServiceInterface::class, RedisService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
