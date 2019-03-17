<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    public function allBlogPosts() 
    {
        $posts = Post::with('user', 'category')->orderBy('id','Desc')->get();
        return response()->json([
            'posts' => $posts
        ], 200);
    }
    public function singlePost($id) 
    {
        $post = Post::with('user', 'category')->where('id', $id)->first();
        return response()->json([
            'post' => $post
        ], 200);
    }
    
}
