<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function makeComment(Request $request, $id)
    {
        $data = $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|string|email',
            'comment' => 'required|string',
        ]);

        $postId = Post::find($id);

        $data['post_id'] = $postId->id;

        Comment::create($data);

        return back();
    }
}
