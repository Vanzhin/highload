<?php

namespace App\Handlers;

use App\Services\SortService;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LoggerHandler implements LoggerHandlerInterface
{

    public function handle(Request $request): void
    {
        date_default_timezone_set('Asia/Yekaterinburg');
        $date = new DateTime();
        $array = range(0, 1000);
        shuffle($array);
        $time_start = $date->format('Y/m/d H:i:s');
        Log::info('старт в ' . $time_start);
        Log::debug('использовано памяти: ' . memory_get_usage());
        $sorted = app(SortService::class)->arraySort($array, 'bubble');
        $time_end = $date->format('Y/m/d H:i:s');
        Log::info('финиш в ' . $time_end);
        Log::debug('использовано памяти: ' . memory_get_usage());
    }
}
