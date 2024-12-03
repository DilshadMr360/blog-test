<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Show the form for creating a new post
    public function create()
    {
        return view('posts.create'); // This will load the form to create a post
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        // Add the authenticated user's ID to the request data
        $request->merge(['user_id' => auth()->id()]);

        // Create the new post with the authenticated user_id
        Post::create($request->all());

        return redirect()->route('posts.index'); // Redirect to the posts index page
    }


    public function index()
    {
        // Get the posts of the logged-in user
        $posts = Post::where('user_id', auth()->id())->with('user')->paginate(10);
        return view('posts.index', ['posts' => $posts]);
    }


    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post')); // Make sure this view exists
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post')); // Make sure this view exists
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->all());
        return redirect()->route('posts.index');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index');
    }
}
