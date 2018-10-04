<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex()
    {
        if( $user_id = Auth::user()->id ){
            $posts = Post::where('user_id', $user_id)->orderBy('id', 'desc')->paginate(10);
            return view('dashboard/index')->with('posts', $posts);
        }
        else{
            $post = Post();
            Session::flash('success', 'You have no posts yet');
            return view('dashboard/index')->with('post', $post);
        }
    }
}
