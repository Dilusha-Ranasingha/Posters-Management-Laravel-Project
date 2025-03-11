<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>posts</title>
</head>
<body>

    
    <!-- Displaying all posts from the post table database -->
    <div style="text-align: center; border: 1px solid #000; padding: 20px; width: 300px; margin: 0 auto; margin-top: 100px;">
        <h2>All Posts</h2>
        <!-- Loop each post and display its details -->
        @foreach($posts as $allposts)
            <div style="border: 1px solid #000; padding: 20px; margin: 10px 0;">
                <h3>{{ $allposts['title'] }}</h3>
                <p>{{ $allposts['body'] }}</p>
                <h4>Author Id: {{ $allposts['user_id'] }}</h4>
                <h4>Posted by: {{ $allposts->user->name }}</h4>

                @if($allposts->image)
                <img src="{{ asset('storage/' . $allposts->image) }}" alt="Post Image" style="width: 200px; height: 200px;">
                @endif

                <!-- Display category name -->
                <h4>Category: {{ $allposts->category ? $allposts->category->name : 'Uncategorized' }}</h4>
            </div>
        @endforeach
    </div>     

    
</body>
</html>