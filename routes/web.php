<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', IndexController::class)
    ->name('index');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::group(['prefix' => 'login', 'as' => 'auth.'], function () {
    Route::get('/', [AuthController::class, 'loginForm'])
        ->name('loginForm');

    Route::post('/', [AuthController::class, 'authenticate'])
        ->name('authenticate');
});
