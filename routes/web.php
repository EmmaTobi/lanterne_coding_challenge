<?php

use Illuminate\Support\Facades\Route;

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

Route::group(["prefix" => '/api'], function () {
    Route::get('/stations', [App\Http\Controllers\StationController::class, "getAllStations"]);
    Route::get('/lines', [App\Http\Controllers\StationController::class, "getAllLines"]);
});


