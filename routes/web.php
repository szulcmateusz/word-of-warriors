<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Game\TrainingController;
use App\Http\Controllers\Game\WarriorController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', IndexController::class)
    ->name('index');

Route::post('/login', [AuthController::class, 'authenticate'])
    ->name('auth.authenticate');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::group(['middleware' => 'auth', 'prefix' => 'game', 'as' => 'game.'], function () {
    Route::get('/', fn() => redirect()->route('game.warrior'));

    Route::get('/warrior', [WarriorController::class, 'index'])
        ->name('warrior');

    Route::get('/training', [TrainingController::class, 'index'])
        ->name('training');

    Route::post('/training', [TrainingController::class, 'train'])
        ->name('training.train');
});
