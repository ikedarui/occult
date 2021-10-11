<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;

class PostController extends Controller
{
    public function add()
    {
        return view('posts.new');
    }
    public function create(Request $request)
    {
        $this->validate($request, Post::$rules);
        
        $post = new Post;
        $form = $request->all();
        
        unset($form['_token']);
        unset($form['image']);
        
        $post->fill($form);
        $post->user_id = auth()->id();
        $post->save();
        
        return redirect('posts.new');
    }
}
