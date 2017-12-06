<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('user.post');
    }

    public function showPost(Post $post)
    {
        return view('user.post',compact('post'));
    }
}
