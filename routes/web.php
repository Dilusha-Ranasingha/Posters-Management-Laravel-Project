<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController; 
use App\Http\Controllers\PostController;
use App\Models\Post;

Route::get('/', function () {
    $posts = Post::all();       //this is use to get the post data from the database
    return view('home', ['posts' => $posts]);     //this is use to return the view and also pass the post data to the view
});

//User related routes
Route::post('/register', [UserController::class, 'register']);
Route::Post('/logout', [UserController::class, 'logout']);
Route::Post('/login', [UserController::class, 'login']);

//posters related routes
Route::post('/create-post', [PostController::class, 'createPost']);


