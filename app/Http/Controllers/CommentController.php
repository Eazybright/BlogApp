<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use Session;
use Purifier;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $post_id)
    {
        $this->validate($request, array(
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|min:5|max:2000'
        ));
        $comments = new Comment();

        $post = Post::find($post_id);

        $comments->name = $request->name;
        $comments->email = $request->email;
        $comments->comment = Purifier::clean($request->comment);
        $comments->approved = true;
        $comments->post()->associate($post);
        $comments->save();

        Session::flash('success', 'Comment was added');

        return redirect()->route('blog.single', [$post->slug]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);
        return view('comments/edit')->with('comment', $comment);        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comments = Comment::find($id)->first();

        $this->validate($request, array(
            'comment' => 'required',
        ));
        $comments->comment = Purifier::clean($request->comment);
        $comments->save();

        Session::flash('successs', 'Comment has been updated');

        return redirect()->route('posts.show', $comments->id)->with('success', 'comment has been updated');
    }

    public function delete($id)
    {
        $comment = Comment::find($id);
        return view('comments/delete')->with('comment', $comment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $post_id =  $comment->id;
        $comment->delete();

        Session::flash('success', 'Your comment was deleted!');

        return redirect()->route('posts.index');
    }
}
