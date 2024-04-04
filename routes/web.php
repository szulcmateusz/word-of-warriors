<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'login', 'as' => 'auth.'], function () {
    Route::get('/', [AuthController::class, 'loginForm'])
        ->name('loginForm');

    Route::post('/', [AuthController::class, 'authenticate'])
        ->name('authenticate');
});
