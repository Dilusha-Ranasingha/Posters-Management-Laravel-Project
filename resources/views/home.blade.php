<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>
</head>
<body>
    <!--@auth, @else, and @endauth are called Blade directives in Laravel-->
    @auth        <!--hecks if a user is logged in. If the user is authenticated-->

    <h2>congrags you are succsessfully logged!</h2>
    <form action="/logout" method="POST">
        @csrf
        <button>Logout</button>
    </form>


    <!--create post form-->
    <div style="text-align: center; border: 1px solid #000; padding: 20px; width: 300px; margin: 0 auto; margin-top: 100px;">
        <h2>Create a New Post</h2>
        <form action="/create-post" method="POST" enctype="multipart/form-data">
            @csrf
                <input type="text" name="title" placeholder="Enter Post Title"><br>
                <textarea name="body" placeholder="Enter Body Content"></textarea><br>
                <input type="file" name="image"><br>
                <select name="category_id" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select><br>
            <button>Create Post</button>
        </form>
    </div>

    <!-- Displaying auth user posts from the post table database -->
    <div style="text-align: center; border: 1px solid #000; padding: 20px; width: 300px; margin: 0 auto; margin-top: 100px;">
        <h2>My Posts</h2>
        <!-- Loop each post and display its details -->
        @foreach($poster as $post)         <!--get the $poster variable from the controller and get as $post and loop through it-->       
            <div style="border: 1px solid #000; padding: 20px; margin: 10px 0;">
                <h3>{{$post['title']}}</h3>
                <p>{{$post['body']}}</p>
                <h4>Author Id: {{$post['user_id']}}</h4>
                <h4>Posted by: {{$post->user->name}}</h4>
                @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" style="width: 200px; height: 200px;">
                @endif
                <h4>Category: {{ $post->category ? $post->category->name : 'Uncategorized' }}</h4>
                <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
                <form action="/delete-post/{{$post->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </div>
        @endforeach
    </div>





    @else        <!--If the user is not authenticated-->

    <!--Register form-->
    <div style="text-align: center; border: 1px solid #000; padding: 20px; width: 300px; margin: 0 auto; margin-top: 100px;">
        <h1>Resgister form</h1>
        <form action="/register" method="POST">
            @csrf                    <!-- It protects your form from CSRF attacks by ensuring the request is from your site. -->
            <input type="text" name="name" placeholder="Name"><br>
            <input type="email" name="email" placeholder="Email"><br>
            <input type="password" name="password" placeholder="Password"><br>
            <button>Register</button>
        </form>
    </div>

    <!--Login form-->
    <div style="text-align: center; border: 1px solid #000; padding: 20px; width: 300px; margin: 0 auto; margin-top: 100px;">
        <h1>Login form</h1>
        <form action="/login" method="POST">
            @csrf                    <!-- It protects your form from CSRF attacks by ensuring the request is from your site. -->
            <input type="text" name="loginname" placeholder="Name"><br>
            <input type="password" name="loginpassword" placeholder="Password"><br>
            <button>Login</button>
        </form>
    </div>


    @endauth       <!--End of the auth check-->
    

</body>
</html>