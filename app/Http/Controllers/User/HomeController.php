<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
    	$posts = Post::paginate(2);
        return view('user.blog',compact('posts'));
    }
}
