<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    /**
     * Public feed
     */
    public function index()
    {
        $posts = Post::with(['user', 'likes', 'comments.user'])
            ->latest()
            ->get();

        return view('social.index', compact('posts'));
    }

    /**
     * Logged-in user's posts
     */
    public function myPosts()
    {
        $posts = Post::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('panel.posts.index', compact('posts'));
    }

    /**
     * Create post form
     */
    public function create()
    {
        return view('panel.posts.create');
    }

    /**
     * Store post
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'nullable|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('posts', 'public');
        }

        auth()->user()->posts()->create($data);

        return redirect()->route('posts.panel')
            ->with('success', 'Post created successfully');
    }

    /**
     * Edit post
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        return view('panel.posts.edit', compact('post'));
    }

    /**
     * Update post
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $data = $request->validate([
            'title'       => 'nullable|string|max:255',
            'description' => 'required|string',
        ]);

        $post->update($data);

        return back()->with('success', 'Post updated');
    }

    /**
     * Delete post
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return back()->with('success', 'Post deleted');
    }
}
