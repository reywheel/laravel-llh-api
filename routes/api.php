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

Route::apiResource('parameters', \App\Http\Controllers\ParameterController::class, ['parameters' => ['parameters' => 'user_id']]);
Route::apiResource('personal-data', \App\Http\Controllers\PersonalDataController::class, ['parameters' => ['personal-data' => 'user_id']]);


// TODO:
// Сделать контроллеры
// Поставить jwt
