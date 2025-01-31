<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Middleware\CountVisitors;

Route::middleware([CountVisitors::class])->group(function () {

    Route::get('/', [MessageController::class, 'welcome'])->name('welcome');
    Route::get('message', [MessageController::class, 'index'])->name('message_form');
    Route::post('/', [MessageController::class, 'store'])->name('message_store');
    Route::get('visitors', [MessageController::class, 'visitors'])->name('visitors');
    Route::get('weather', [MessageController::class, 'weather'])->name('weather');
});
