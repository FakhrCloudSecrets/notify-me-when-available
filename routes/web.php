<?php

use Illuminate\Support\Facades\Route;
use Task\NotifyMeWhenAvailable\Http\Controllers\AuthController;
use Task\NotifyMeWhenAvailable\Http\Controllers\ProductController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'loginForm']);
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/dashboard/login', [AuthController::class, 'dashboardLoginForm']);
Route::post('/dashboard/login', [AuthController::class, 'dashboardLogin'])->name('dashboard.login');

Route::group(['middleware' => 'auth:user'], function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::group([ 'prefix' => 'product', 'as' => 'product.'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/edit', [ProductController::class, 'edit'])->name('edit');
        Route::post('/update', [ProductController::class, 'update'])->name('update');
    });
});
