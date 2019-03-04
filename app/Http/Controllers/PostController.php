<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Auth;
use Image;

class PostController extends Controller
{
    public function allPost()
    {
        $posts = Post::with('user', 'category')->orderBy('id','Desc')->get();
        return response()->json([
            'posts' => $posts
        ], 200);
    }
    public function savepost(Request $request) 
    {
        $this->validate(
			$request, 
			[
                'title'=>'required|min:2|max:50',
                'description'=>'required|min:2|max:1000'
			]
		);
        $post = new Post();
        $strposOfSemicolon = strpos($request->photo, ';');
        $substring = substr($request->photo, 0, $strposOfSemicolon);
        $extenshion = explode('/',$substring)[1];
        $name = time().".".$extenshion;
        $img = Image::make($request->photo)->resize(100, 100);
        $upload_path = public_path()."/uploadimage/"; 
        $img->save($upload_path.$name);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = Auth::user()->id;
        $post->cat_id = $request->cat_id;
        $post->photo = $name;
        $post->save();
    }
}
