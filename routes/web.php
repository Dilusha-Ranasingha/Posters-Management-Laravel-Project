<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController; 
use App\Http\Controllers\PostController;
use App\Models\Post;

Route::get('/', function () {
    $poster = Post::where('user_id', auth()->id())->get();     // Retrieve only posts created by the logged-in user
    return view('home', ['poster' => $poster]);          // Pass the retrieved posts data to the 'home' view for display in the home.blade.php file by using the $posts variable
});

Route::get('/posts', function () {
    $posts = Post::all();             // Retrieve all posts from the 'posts' table using the Post model
    return view('posters', ['posts' => $posts]);          // Pass the retrieved posts data to the 'posts' view for display in the posts.blade.php file by using the $posts variable
});

//User related routes
Route::post('/register', [UserController::class, 'register']);
Route::Post('/logout', [UserController::class, 'logout']);
Route::Post('/login', [UserController::class, 'login']);

//posters related routes
Route::post('/create-post', [PostController::class, 'createPost']);
Route::get('/edit-post/{post}', [PostController::class, 'showEditPost']);
Route::get('/edit-post/{allposts}', [PostController::class, 'showEditallposts']);


