<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController; 
use App\Http\Controllers\PostController;
use App\Models\Post;

Route::get('/', function () {
    $posts = Post::all();       // Retrieve all posts from the 'posts' table using the Post model
    return view('home', ['posts' => $posts]);     // Pass the retrieved posts data to the 'home' view for display in the home.blade.php file by using the $posts variable
});

//User related routes
Route::post('/register', [UserController::class, 'register']);
Route::Post('/logout', [UserController::class, 'logout']);
Route::Post('/login', [UserController::class, 'login']);

//posters related routes
Route::post('/create-post', [PostController::class, 'createPost']);


