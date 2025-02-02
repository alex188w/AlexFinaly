<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Middleware\CountVisitors;

Route::middleware([CountVisitors::class])->group(function () {

    Route::get('/', [MessageController::class, 'welcome'])->name('welcome');
    Route::get('message/{action}', [MessageController::class, 'indexAction'])->name('messageAction');
    Route::post('message/mail', [MessageController::class, 'store'])->name('message_form');
    Route::post('message/chat', [MessageController::class, 'chatStore'])->name('chat_form');
    Route::get('visitors', [MessageController::class, 'visitors'])->name('visitors');
    Route::get('weather', [MessageController::class, 'weather'])->name('weather');
});
