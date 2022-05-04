<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostLikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Post $post, Request $request)
    {
        $post->likes()->create([
            'user_id' => $request->user()->id,
        ]);

        return redirect()->back();
    }

    public function unlike(Post $post, Request $request)
    {
        $request->user()->likes()->where('post_id', $post->id)->delete();

        return redirect()->back();
    }
}
