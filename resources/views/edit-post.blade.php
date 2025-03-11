<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edit Post</h1>
    <form action="/edit-post/{{$post->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" value="{{ $post->title }}"><br>
            @error('title')
                <span style="color: red;">{{ $message }}</span><br>
            @enderror

            <label for="body">Body:</label>
            <textarea name="body">{{ $post->body }}</textarea><br>
            @error('body')
                <span style="color: red;">{{ $message }}</span><br>
            @enderror

            <label for="category_id">Category:</label>
            <select name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select><br>
            @error('category_id')
                <span style="color: red;">{{ $message }}</span><br>
            @enderror

            <label for="image">Image:</label>
            <input type="file" name="image"><br>
            @error('image')
                <span style="color: red;">{{ $message }}</span><br>
            @enderror

            @if($post->image)
                <p>Current Image: <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" style="width: 200px; height: 200px;"></p>
            @endif

            <button>Update Post</button>
        </div>
        @error('error')
            <span style="color: red;">{{ $message }}</span><br>
        @enderror
    </form>
</body>
</html>