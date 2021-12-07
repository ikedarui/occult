<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Post;
use App\Prefecture;
use App\Comment;

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
        
        return redirect('posts/');
    }
    
    public function index(Request $request)
    {
        $posts = Post::all()->sortByDesc('updated_at');
        $cond_title = $request->cond_title;
        
        if ($cond_title != '') {
            $prefecture = Prefecture::where('name', $cond_title)->first();
            if (isset($prefecture)) {
                $posts = $prefecture->posts;
            }
        }
            
        // posts/index.blade.php ファイルを渡している
        // また View テンプレートに posts、という変数を渡している
        return view('posts.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    public function edit(Request $request)
    {
        $post = Post::find($request->id);
        if (empty($post)) {
            abort(404);
        }
        
        $user = Auth::user();
        if ($user->id != $post->user_id) {
            $posts = Post::all()->sortByDesc('updated_at');
            $cond_title = "";
            return view('posts.index', ['posts' => $posts, 'cond_title' => $cond_title]);
        }
        
        return view('posts.edit', ['post_form' => $post]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Post::$rules);
        $post = Post::find($request->id);
        $post_form = $request->all();
        
        unset($post_form['_token']);
        unset($post_form['_remove']);
        
        $post->fill($post_form)->save();
        
        return redirect('posts/');
    }
}
