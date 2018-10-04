<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{

    public function getIndex(){
        $posts = Post::orderBy('id', 'desc')->paginate(10);

        return view('blog/index')->with('posts', $posts);
    }

    public function getSingle($slug){
        //fetch from database based on slug
        $post = Post::where('slug', '=', $slug)->first();

        return view('blog/single')->with('post', $post);
    }

}
