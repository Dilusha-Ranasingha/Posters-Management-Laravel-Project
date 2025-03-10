<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Edit AllPost</h1>
    <form action="/edit-post/{{$allposts->id}}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <input type="text" name="title" value="{{ $allposts->title }}"><br>
            <textarea name="body">{{ $allposts->body }}</textarea><br>

            <button>Update Post</button>
        </div>
    </form>
</body>
</html>