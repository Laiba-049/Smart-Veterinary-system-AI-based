<?php

namespace App\Http\Controllers;

use App\Models\Post;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Like / Unlike toggle
     */
    public function toggle(Post $post)
    {
        $like = $post->likes()->where('user_id', auth()->id());

        if ($like->exists()) {
            $like->delete();
        } else {
            $post->likes()->create([
                'user_id' => auth()->id(),
            ]);
        }

        return back();
    }
}
