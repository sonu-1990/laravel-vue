<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function allPost()
    {
        $posts = Post::all();
        return response()->json([
            'posts' => $posts
        ], 200);
    }
}
