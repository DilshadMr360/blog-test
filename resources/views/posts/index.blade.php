@extends('layouts.app')

@section('content')
    <div class="px-6 py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <h1 class="mb-8 text-4xl font-bold text-center text-gray-900">Posts</h1>

        <div class="mb-6 text-right">
            <a href="{{ route('posts.create') }}" class="inline-block px-6 py-3 text-lg font-semibold text-white transition duration-300 bg-blue-600 rounded-lg shadow-md hover:bg-blue-700">Create Post</a>
        </div>

        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($posts as $post)
                <div class="overflow-hidden transition-transform transform bg-white rounded-lg shadow-lg hover:scale-105 hover:shadow-xl">
                    <img src="https://via.placeholder.com/600x400" alt="Post image" class="object-cover w-full h-48">
                    <div class="p-6">
                        <h2 class="mb-3 text-2xl font-semibold text-gray-800">{{ $post->title }}</h2>
                        <p class="mb-4 text-gray-600">{{ Str::limit($post->content, 150) }}</p>
                        <div class="flex items-center justify-between text-sm text-gray-500">
                            <span>By: <span class="font-medium text-gray-800">{{ $post->user->name }}</span></span>
                            <span class="text-gray-400">{{ $post->created_at->diffForHumans() }}</span>
                        </div>

                        <div class="flex mt-4 space-x-4">
                            <a href="{{ route('posts.show', $post->id) }}" class="font-medium text-blue-600 transition duration-200 hover:text-blue-800">View</a>
                            <a href="{{ route('posts.edit', $post->id) }}" class="font-medium text-yellow-600 transition duration-200 hover:text-yellow-800">Edit</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-medium text-red-600 transition duration-200 hover:text-red-800">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $posts->links('pagination::tailwind') }}
        </div>
    </div>
@endsection
