<?php

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

Route::apiResource('arterial-pressure-data', \App\Http\Controllers\ArterialPressureDataController::class)
    ->parameter('arterial-pressure-data', 'arterial_pressure_data')
    ->whereNumber('arterial_pressure_data');

Route::apiResource('parameters', \App\Http\Controllers\ParameterController::class)
    ->whereNumber('parameter');

Route::apiResource('personal-data', \App\Http\Controllers\PersonalDataController::class)
    ->parameter('personal-data', 'personal_data')
    ->whereNumber('personal_data');

Route::apiResource('pulse-data', \App\Http\Controllers\PulseDataController::class)
    ->parameter('pulse-data', 'pulse_data')
    ->whereNumber('pulse_data');

Route::apiResource('sleep-data', \App\Http\Controllers\SleepDataController::class)
    ->parameter('sleep-data', 'sleep_data')
    ->whereNumber('sleep_data');

Route::apiResource('temperature-data', \App\Http\Controllers\TemperatureDataController::class)
    ->parameter('temperature-data', 'temperature_data')
    ->whereNumber('temperature_data');


// TODO:
// Сделать контроллеры
// Поставить jwt
