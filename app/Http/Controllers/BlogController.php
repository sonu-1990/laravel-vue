<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

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

    public function allCategories() 
    {
        $categories = Category::all();
        return response()->json([
            'categories' => $categories
        ], 200);
    }
    public function allPostsByCategory($id) 
    {
        $posts = Post::with('user', 'category')->where('cat_id', $id)->orderBy('id','Desc')->get();
        return response()->json([
            'posts' => $posts
        ], 200);

    }
    public function allPostBySearch() 
    {
        $search = \Request::get('s');
        $posts = Post::with('user', 'category')
        ->where('title', 'LIKE', "%$search%")
        ->orWhere('description', 'LIKE', "%$search%")
        ->orderBy('id', 'Desc')
        ->get();
        return response()->json([
            'posts' => $posts
        ], 200);
    }
    
}
