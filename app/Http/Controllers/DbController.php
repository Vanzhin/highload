<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DbController extends Controller
{
    public function index()
    {
        $time_start = microtime(true);
        $database = DB::table('customers')->where('customerName', '=','Baane Mini Imports')->get(['customerNumber', 'phone'])->toArray();
        $time_end = microtime(true);
        $time = $time_end - $time_start;
        Log::info('время работы для Db составило: ' . $time . ' c');

        return $database;
    }
}
