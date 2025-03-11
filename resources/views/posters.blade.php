<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Posts</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-black text-gray-100 font-sans">
    <div class="min-h-screen py-12">
        <div class="max-w-4xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-white mb-8">All Posts</h2>
            <div class="space-y-6">
                @foreach($posts as $allposts)
                    <div class="p-6 bg-gray-800 rounded-xl shadow-2xl shadow-black/50 transition-transform hover:scale-105">
                        <h3 class="text-2xl font-semibold text-white mb-2">{{ $allposts['title'] }}</h3>
                        <p class="text-gray-300 mb-4">{{ $allposts['body'] }}</p>
                        <div class="text-sm text-gray-400 space-y-1">
                            <!--<h4>Author Id: {{ $allposts['user_id'] }}</h4>-->
                            <h4>Posted by: {{ $allposts->user->name }}</h4>
                            <h4>Category: {{ optional($allposts->category)->name ?? 'Uncategorized' }}</h4>
                        </div>
                        @if($allposts->image)
                            <img src="{{ asset('storage/' . $allposts->image) }}" alt="Post Image" class="mt-4 w-full max-w-md h-64 object-cover rounded-lg shadow-md">
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>