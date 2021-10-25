<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;
use App\Prefecture;

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
}
