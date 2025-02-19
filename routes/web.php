<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController; 
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('home');
});

//User related routes
Route::post('/register', [UserController::class, 'register']);
Route::Post('/logout', [UserController::class, 'logout']);
Route::Post('/login', [UserController::class, 'login']);

//posters related routes
Route::post('/create-post', [PostController::class, 'createPost']);


