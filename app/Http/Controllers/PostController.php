<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function add()
    {
        return view('posts.new');
    }
    public function create(Request $request)
    {
        return redirect('posts.new');
    }
}
