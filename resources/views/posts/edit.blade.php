@extends('layouts.app')

@section('content')
    <div class="px-6 py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <h1 class="mb-6 text-3xl font-bold text-center text-gray-900">Edit Post</h1>

        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" value="{{ $post->title }}" class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                <textarea name="content" id="content" class="w-full px-4 py-2 border border-gray-300 rounded-md" required>{{ $post->content }}</textarea>
            </div>

            <div class="mt-6 text-right">
                <button type="submit" class="inline-block px-4 py-2 text-white bg-blue-500 rounded-lg">Update Post</button>
            </div>
        </form>
    </div>
@endsection
