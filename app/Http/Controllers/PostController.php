<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function createPost(Request $request) {
        $incommingFileds = $request->validate([
            'title' => ['required', 'string', 'max:255'], //required|string|max:255 is make sure the title is a string and not empty
            'body' => ['required', 'string'],     //required|string is make sure the body is a string and not empty
        ]);

        //the following 2 line code is to prevent malicious attacks
        $incommingFileds['title'] = strip_tags($incommingFileds['title']);      // strip_tag is use to remove any HTML tags from user input to prevent malicious attacks and store clean text in the database
        $incommingFileds['body'] = strip_tags($incommingFileds['body']);


        $incommingFileds['user_id'] = auth()->id() ;      //set the user_id column data and auth()->id() is a function that laravel already provided to get the user id of the currently logged in user

        Post::create($incommingFileds);
        return redirect('/');


    }

    public function showEditPost(Post $post){
        if(auth()->user()->id !== $post['user_id']){         //if user not logged in to the system then redirect to the home page
            return redirect('/');
        }

        return view('edit-post', ['post' => $post]);
    }

    // public function updateEditPost(Post $post, Request $request){
        
    // }

    public function showEditallposts(Post $allposts){
        if(auth()->user()->id !== $post['user_id']){
            return redirect('/');
        }

        return view('edit-allpost', ['allposts' => $allposts]);
    }
}
