<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="flex justify-between px-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <a href="{{ route('posts.index') }}" class="text-lg font-semibold text-white">Posts</a>
            <a href="{{ route('posts.create') }}" class="px-4 py-2 text-blue-600 bg-white rounded-lg">Create Post</a>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>
    </body>
</html>
