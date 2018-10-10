<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{

    public function getIndex(){
        $posts = new Post;
        if($posts = Post::where('published', 1)->orderBy('id', 'desc')->paginate(10)){
            return view('blog/index')->with('posts', $posts);
        }
        return view('blog/index');
    }

    public function getSingle($slug){
        //fetch from database based on slug
        $post = Post::where('slug', '=', $slug)->first();

        return view('blog/single')->with('post', $post);
    }

}
