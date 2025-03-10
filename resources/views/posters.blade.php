<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>posts</title>
</head>
<body>

    @auth 
    <!-- Displaying all posts from the post table database -->
    <div style="text-align: center; border: 1px solid #000; padding: 20px; width: 300px; margin: 0 auto; margin-top: 100px;">
        <h2>All Posts</h2>
        <!-- Loop each post and display its details -->
        @foreach($posts as $allposts)       <!--get the $posts variable from the controller and get as $post and loop through it-->       
            <div style="border: 1px solid #000; padding: 20px; margin: 10px 0;">
                <h3>{{$allposts['title']}}</h3>
                <p>{{$allposts['body']}}</p>
                <h4>Posted by: {{$allposts['user_id']}}</h4>
                <h4>Posted by: {{$allposts->user->name}}</h4>
            </div>
        @endforeach
    </div>




    @else       


    @endauth       

    
</body>
</html>