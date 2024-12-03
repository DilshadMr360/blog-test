<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class ApiPostController extends Controller
{
    public function index()
    {
        return Post::with('user')->paginate(10);
    }

    public function show($id)
    {
        return Post::findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        return auth()->user()->posts()->create($request->all());
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        if ($post->user_id != auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $post->update($request->all());
        return $post;
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if ($post->user_id != auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $post->delete();
        return response()->noContent();
    }

}
