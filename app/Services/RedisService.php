<?php

namespace App\Services;

use App\Cache\Enums\Cache;
use App\Cache\Enums\CachePort;
use Redis;

class RedisService implements RedisServiceInterface
{
    public function getConnection(): Redis
    {
        $redis = new Redis();
        $redis->connect(Cache::REDIS->value, CachePort::REDIS_PORT->value);

        return $redis;
    }


    public function setValues(array $values)
    {
        foreach ($values as $key => $value){
            $this->getConnection()->set($key, $value);
        }

    }

    public function getValues(array $keys): array
    {
        $values = [];
        foreach ($keys as $key){
            $values[] = $this->getConnection()->get($key);
        }
        return $values;
    }
}

