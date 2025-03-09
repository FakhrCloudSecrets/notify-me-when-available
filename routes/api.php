<?php

use Illuminate\Support\Facades\Route;
use Task\NotifyMeWhenAvailable\Http\Controllers\NotifyController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'notify', 'as' => 'notify.'], function () {
    Route::post('/create', [NotifyController::class, 'create'])->name('create');
});
