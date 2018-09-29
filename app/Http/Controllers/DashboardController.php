<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(5);
        return view('dashboard/index')->with('posts', $posts);
    }
}
