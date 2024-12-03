@extends('layouts.app')

@section('content')
    <div class="px-6 py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-center text-gray-900">Create Post</h1>

        <form action="{{ route('posts.store') }}" method="POST" class="mt-8 space-y-6">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" class="w-full mt-1 border-gray-300 rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                <textarea name="content" id="content" class="w-full mt-1 border-gray-300 rounded-md" required></textarea>
            </div>

            <button type="submit" class="w-full px-6 py-2 text-white bg-blue-500 rounded-md">Create Post</button>
        </form>
    </div>
@endsection
