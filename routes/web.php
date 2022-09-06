<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{LoggerController, MemcachedController, RedisController, DbController};


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/homework', [LoggerController::class, 'index']);

Route::group(['as' => 'hw5.', 'prefix' => 'hw5'], function (){
    Route::get('/memcached', [MemcachedController::class, 'index'])
        ->name('memcached');
    Route::get('/redis', [RedisController::class, 'index'])
        ->name('redis');
    Route::get('/db', [DbController::class, 'index'])
        ->name('db');
});
