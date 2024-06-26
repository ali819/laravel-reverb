<?php

use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('message');
})->name('home');

Route::post('/message/send', [MessageController::class, 'sendMessage'])->name('sendMessage');
