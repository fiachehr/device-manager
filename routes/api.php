<?php

use App\Http\Controllers\DeviceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'device'], function () {
    Route::post('/register', [DeviceController::class, 'register'])->name('device.register');
    Route::get('/info/{id}', [DeviceController::class, 'info'])->name('device.information');
});

Route::group(['prefix' => 'leasing'], function () {
    Route::post('/update/{id}', [DeviceController::class, 'update'])->name('device.update');
});
