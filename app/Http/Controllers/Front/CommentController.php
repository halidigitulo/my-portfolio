<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {
        // Validasi input komentar
        $request->validate([
            'author_name' => 'required',
            'author_email' => 'required|email',
            'content' => 'required',
        ]);

        try {
            // Simpan komentar
            $comment = Comment::create([
                'content' => $request->content,
                'author_name' => $request->author_name,
                'author_email' => $request->author_email,
                'post_id' => $postId,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Your comment has been posted successfully!',
                'comment' => $comment,
                'created_at' => $comment->created_at->format('d M Y'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'There was an error posting your comment. Please try again.',
            ]);
        }
    }
}
