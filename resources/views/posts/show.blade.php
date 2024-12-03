@extends('layouts.app')

@section('content')
    <div class="px-6 py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="mb-8 overflow-hidden bg-white rounded-lg shadow-lg">
            <div class="p-6">
                <h2 class="text-2xl font-semibold text-gray-800">{{ $post->title }}</h2>
                <p class="mt-4 text-gray-600">{{ $post->content }}</p>
                <div class="mt-4 text-sm text-gray-500">
                    <span>Author: </span>
                    <span class="font-medium text-gray-800">{{ $post->user->name }}</span>
                </div>
            </div>
        </div>

        <div class="mt-6 text-right">
            <a href="{{ route('posts.index') }}" class="inline-block px-4 py-2 text-white bg-gray-500 rounded-lg">Back to Posts</a>
        </div>
    </div>
@endsection
