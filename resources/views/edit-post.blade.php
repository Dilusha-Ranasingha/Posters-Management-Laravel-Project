<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-black text-gray-100 font-sans">
    <div class="min-h-screen flex items-center justify-center">
        <div class="w-full max-w-lg mx-4 p-6 bg-gray-800 rounded-xl shadow-2xl shadow-black/50">
            <h1 class="text-3xl font-bold text-center text-white mb-6">Edit Post</h1>
            <form action="/edit-post/{{$post->id}}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-300">Title</label>
                    <input type="text" name="title" value="{{ $post->title }}" class="mt-1 w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500">
                    @error('title')
                        <span class="text-red-400 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="body" class="block text-sm font-medium text-gray-300">Body</label>
                    <textarea name="body" class="mt-1 w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 h-32">{{ $post->body }}</textarea>
                    @error('body')
                        <span class="text-red-400 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="category_id" class="block text-sm font-medium text-gray-300">Category</label>
                    <select name="category_id" class="mt-1 w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-gray-500">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="text-red-400 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-300">Image</label>
                    <input type="file" name="image" class="mt-1 w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-gray-600 file:text-gray-200 hover:file:bg-gray-500">
                    @error('image')
                        <span class="text-red-400 text-sm mt-1">{{ $message }}</span>
                    @enderror
                    @if($post->image)
                        <p class="mt-2 text-gray-400">Current Image: <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="mt-2 w-48 h-48 object-cover rounded-lg shadow-md"></p>
                    @endif
                </div>
                <button type="submit" class="w-full p-3 bg-gray-600 text-white rounded-lg hover:bg-gray-500 transition-colors duration-200">Update Post</button>
            </form>
        </div>
    </div>
</body>
</html>