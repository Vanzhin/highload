<?php

namespace App\Http\Controllers;

use App\Services\MemcachedServiceInterface;
use Illuminate\Support\Facades\Log;

class MemcachedController extends Controller
{
    public function __construct(private MemcachedServiceInterface $memcacheService)
    {
    }

    public function index()
    {

        $keys = ['int', 'string'];

        $values = [
            'int' => 99,
            'string' => 'a simple string',
        ];

        $this->memcacheService->setValues($values);
        $time_start = microtime(true);
        $cache = $this->memcacheService->getValues($keys);
        $time_end = microtime(true);
        $time = $time_end - $time_start;
        Log::info('время работы для Memcached составило: ' . $time . ' c');

        return $cache;
    }
}
