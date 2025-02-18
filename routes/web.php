<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController; 

Route::get('/', function () {
    return view('home');
});

Route::post('/register', [UserController::class, 'register']);

Route::Post('/logout', [UserController::class, 'logout']);

Route::Post('/login', [UserController::class, 'login']);


