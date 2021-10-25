<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;
use App\User;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            $posts = Post::where('title', $cond_title)->get();
        } else {
            $posts = Post::all();
        }
        return view('admin.posts.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    public function delete(Request $request)
    {
        $posts = Post::find($request->id);
        $posts->delete();
        return redirect('admin/posts/');
    }
    
    public function user(Request $request)
    {
        $cond_name = $request->cond_name;
        if ($cond_name != '') {
            $users = User::where('name', $cond_name)->get();
        } else {
            $users = User::all();
        }
        return view('admin.users.index',['users' => $users, 'cond_name' => $cond_name]);
    }
    
    public function delete2(Request $request)
    {
        $users = User::find($request->id);
        $users->delete();
        return redirect('admin/user/');
    }
}
