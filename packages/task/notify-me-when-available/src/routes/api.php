<?php

use Illuminate\Support\Facades\Route;
use Task\NotifyMeWhenAvailable\Http\Controllers\NotifyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'notify'], function () {
    Route::get('/create', [NotifyController::class, 'create']);
});