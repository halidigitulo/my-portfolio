<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function post_listing()
    {
        // Latest post
        $latestPost = Post::orderBy('created_at', 'desc')->first();

        // All posts
        $posts = Post::inRandomOrder()->take(3)->orderBy('created_at', 'desc')->get();
        return view('front.post.index', compact('posts', 'latestPost'));
    }


    public function post_detail($slug)
    {
        $data = Post::where('slug', $slug)->firstOrFail();

        // Get next post
        $nextPost = Post::where('id', '>', $data->id)
            ->orderBy('id', 'asc')
            ->first();

        if (!$nextPost) {
            // If it's the last post, get the first post
            $nextPost = Post::orderBy('id', 'asc')->first();
        }

        // Random posts excluding current post
        $randomData = Post::inRandomOrder()->where('id', '!=', $data->id)->take(3)->get();

        return view('front.post.detail', [
            'data' => $data,
            'randomData' => $randomData,
            'nextPost' => $nextPost,
            'judul' => $data->judul
        ]);
    }
}
