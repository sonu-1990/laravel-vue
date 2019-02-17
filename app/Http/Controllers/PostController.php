<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function all_post()
    {
        $posts = Post::with('category')->get();
        return $posts;
    }
}
