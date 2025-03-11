<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    
    public function createPost(Request $request) {
        $incommingFileds = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);
    
        \Log::info('Validated fields:', $incommingFileds); // Log validated data
    
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('post_images', 'public');
            \Log::info('Image stored at:', ['path' => $imagePath]); // Log image path
        }
    
        $incommingFileds['title'] = strip_tags($incommingFileds['title']);
        $incommingFileds['body'] = strip_tags($incommingFileds['body']);
        $incommingFileds['user_id'] = auth()->id();
    
        if ($imagePath) {
            $incommingFileds['image'] = $imagePath;
        }
    
        \Log::info('Data to be saved:', $incommingFileds); // Log data before saving
        $post = Post::create($incommingFileds);
    
        \Log::info('Post created:', $post->toArray()); // Log the created post
        return redirect('/');
    }

    public function showEditPost(Post $post){
        if(auth()->user()->id !== $post['user_id']){         //if user not logged in to the system then redirect to the home page
            return redirect('/');
        }

        // Fetch all categories to show in the edit form
        $categories = Category::all();

        return view('edit-post', ['post' => $post, 'categories' => $categories]);
    }

    public function updateEditPost(Post $post, Request $request){
        if(auth()->user()->id !== $post['user_id']){
            return redirect('/');
        }
    
        try {
            $incommingFileds = $request->validate([
                'title' => 'required|string|max:255', 
                'body' => 'required|string',
                'category_id' => 'required|exists:categories,id', 
                'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', 
            ]);
    
            $incommingFileds['title'] = strip_tags($incommingFileds['title']);
            $incommingFileds['body'] = strip_tags($incommingFileds['body']);
    
            // Log the incoming request data
            \Log::info('Update request data:', $request->all());
            \Log::info('Validated fields:', $incommingFileds);
    
            // Handle image upload if a new image is provided
            if ($request->hasFile('image')) {
                \Log::info('New image detected', ['file' => $request->file('image')->getClientOriginalName()]);
                
                // Delete the old image if it exists
                if ($post->image && file_exists(storage_path('app/public/' . $post->image))) {
                    unlink(storage_path('app/public/' . $post->image));
                    \Log::info('Old image deleted:', ['path' => $post->image]);
                }
    
                // Store the new image
                $imagePath = $request->file('image')->store('post_images', 'public');
                $incommingFileds['image'] = $imagePath;
                \Log::info('New image stored:', ['path' => $imagePath]);
            } else {
                // Preserve the existing image if no new image is uploaded
                $incommingFileds['image'] = $post->image;
                \Log::info('No new image uploaded, preserving existing:', ['path' => $post->image]);
            }
    
            // Update the post
            $post->update($incommingFileds);
            \Log::info('Post updated:', $post->toArray());
    
            return redirect('/');
        } catch (\Exception $e) {
            \Log::error('Error updating post:', ['message' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            return back()->withErrors(['error' => 'Failed to update post: ' . $e->getMessage()]);
        }
    }

    public function deletePost(Post $post){
        if(auth()->user()->id === $post['user_id']){

            if ($post->image) {                   //delete the image from the public folder
                unlink(storage_path('app/public/' . $post->image));
            }

            $post->delete();
        }

        return redirect('/');
    }

    
}
