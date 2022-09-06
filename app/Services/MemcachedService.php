<?php

namespace App\Services;
use App\Cache\Enums\Cache;
use App\Cache\Enums\CachePort;
use Memcached;

class MemcachedService implements MemcachedServiceInterface
{
    public function getConnection(): Memcached
    {
            $memcached = new Memcached();
            $memcached->addServer(Cache::MEMCACHE->value, CachePort::MEMCACHE_PORT->value);

        return $memcached;
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
