<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-black text-gray-100 font-sans">
    <div class="min-h-screen py-12">
        <div class="max-w-4xl mx-auto px-4">
            <!--@auth, @else, and @endauth are called Blade directives in Laravel-->
            @auth        <!--hecks if a user is logged in. If the user is authenticated-->

            
            <div class="mb-6 text-right">
                <form action="/logout" method="POST">
                    @csrf
                    <button class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-500 transition-colors duration-200">Logout</button>
                </form>
            </div>


            <!--create post form-->
            <div class="mb-12 p-6 bg-gray-800 rounded-xl shadow-2xl shadow-black/50">
                <h2 class="text-3xl font-bold text-center text-white mb-6">Hey {{ Auth::user()->name }}, Make a New Post</h2>
                <form action="/create-post" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                        <input type="text" name="title" placeholder="Enter Post Title" class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500"><br>
                        <textarea name="body" placeholder="Enter Body Content" class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 h-32"></textarea><br>
                        <input type="file" name="image" class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-gray-600 file:text-gray-200 hover:file:bg-gray-500"><br>
                        <select name="category_id" required class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-gray-500">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select><br>
                    <button type="submit" class="w-full p-3 bg-gray-600 text-white rounded-lg hover:bg-gray-500 transition-colors duration-200">Create Post</button>
                </form>
            </div>

            <!-- Displaying auth user posts from the post table database -->
            <div class="p-6 bg-gray-800 rounded-xl shadow-2xl shadow-black/50">
                <h2 class="text-3xl font-bold text-center text-white mb-6">My Posts</h2>
                <!-- Loop each post and display its details -->
                @foreach($poster as $post)         <!--get the $poster variable from the controller and get as $post and loop through it-->       
                    <div class="p-6 mb-4 bg-gray-700 rounded-lg shadow-md">
                        <h3 class="text-2xl font-semibold text-white mb-2">{{$post['title']}}</h3>
                        <p class="text-gray-300 mb-4">{{$post['body']}}</p>
                        <h4 class="text-sm text-gray-400">Author Id: {{$post['user_id']}}</h4>
                        <h4 class="text-sm text-gray-400">Posted by: {{$post->user->name}}</h4>
                        <h4 class="text-sm text-gray-400">Category: {{ $post->category ? $post->category->name : 'Uncategorized' }}</h4>
                        @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="mt-4 w-full max-w-md h-64 object-cover rounded-lg shadow-md">
                        @endif
                            
                        <div class="mt-4 flex space-x-4">
                            <p><a href="/edit-post/{{$post->id}}" class="text-gray-300 hover:text-white">Edit</a></p>
                            <form action="/delete-post/{{$post->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-400 hover:text-red-300">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>





            @else        <!--If the user is not authenticated-->

            <!--Register form-->
            <div class="min-h-screen flex flex-col items-center justify-center space-y-12">
                <div class="w-full max-w-md p-6 bg-gray-800 rounded-xl shadow-2xl shadow-black/50">
                    <h1 class="text-3xl font-bold text-center text-white mb-6">Resgister form</h1>
                    <form action="/register" method="POST" class="space-y-6">
                        @csrf                    <!-- It protects your form from CSRF attacks by ensuring the request is from your site. -->
                        <input type="text" name="name" placeholder="Name" class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500"><br>
                        <input type="email" name="email" placeholder="Email" class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500"><br>
                        <input type="password" name="password" placeholder="Password" class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500"><br>
                        <button type="submit" class="w-full p-3 bg-gray-600 text-white rounded-lg hover:bg-gray-500 transition-colors duration-200">Register</button>
                    </form>
                </div>

                <!--Login form-->
                <div class="w-full max-w-md p-6 bg-gray-800 rounded-xl shadow-2xl shadow-black/50">
                    <h1 class="text-3xl font-bold text-center text-white mb-6">Login Form</h1>
                    <form action="/login" method="POST" class="space-y-6">
                        @csrf                    <!-- It protects your form from CSRF attacks by ensuring the request is from your site. -->
                        <input type="text" name="loginname" placeholder="Name" class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500"><br>
                        <input type="password" name="loginpassword" placeholder="Password" class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500"><br>
                        <button type="submit" class="w-full p-3 bg-gray-600 text-white rounded-lg hover:bg-gray-500 transition-colors duration-200">Login</button>
                    </form>
                </div>
            </div>


            @endauth       <!--End of the auth check-->
            
        </div>
    </div>
</body>
</html>