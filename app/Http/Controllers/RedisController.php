<?php

namespace App\Http\Controllers;

use App\Services\RedisServiceInterface;
use Illuminate\Support\Facades\Log;

class RedisController extends Controller
{
    public function __construct(private RedisServiceInterface $redisService)
    {
    }
    public function index()
    {
        $keys = ['int', 'string'];

        $values = [
            'int' => 100,
            'string' => 'another simple string',
        ];
        $this->redisService->setValues($values);
        $time_start = microtime(true);
        $cache = $this->redisService->getValues($keys);
        $time_end = microtime(true);
        $time = $time_end - $time_start;
        Log::info('время работы для Redis составило: ' . $time . ' c');

        return $cache;
    }
}
