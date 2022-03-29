<?php

use App\Http\Controllers\NotifyController;
use App\Http\Controllers\SettingsController;
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

Route::post('/notify',       NotifyController::class)
    ->name('notify')
    ->middleware('auth:portal');

Route::post('/settings',     SettingsController::class)
    ->name('settings.update')
    ->middleware('auth:portal');
