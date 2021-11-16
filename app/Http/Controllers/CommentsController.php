<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Comment;
use App\Post;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, Comment::$rules);
        $comment = Comment::find($request->post_id);
            
        $comment = new Comment;
        
        $comment_form = $request->all();
        $comment -> user_id = Auth::id();
        $comment -> post_id = $request -> post_id;
        $comment -> fill($comment_form);
        $comment -> save();
        
        return redirect('posts')->with('commentstatus','コメントを投稿しました');
    }
}
