<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Session;
use Purifier;
use Image;
use Storage;
use Cloudder;
use App\User;
use Auth;

class PostController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //find all data from the database
        if( $user_id = Auth::user()->id ){
            $posts = Post::where('user_id', $user_id)->orderBy('id', 'desc')->paginate(10);
            return view('posts/index')->with('posts', $posts);
        }
        else{
            $post = Post();
            Session::flash('success', 'You have no posts yet');
            return view('posts/index')->with('post', $post);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts/create')->with('categories', $categories)->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the data
        $this->validate($request, array(
            'title' => 'required|max:255',
            'body' => 'required',
            'slug' => 'required|min:5|max:255|alpha_dash|unique:posts,slug',
            'category_id' => 'required|integer',
            'image' => 'image|max:1999|mimes:jpeg,jpg,bmp,png,gif'
        ));
        if($request->hasFile('image')){        
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);            
           // Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension; 
            $path = $request->file('image')->storeAs('/images', $fileNameToStore);
        }else {
            $fileNameToStore = 'noimage.jpg';
        }
        //store into the database
        $post = new Post;
        $post->title = $request->title;
        $post->body = Purifier::clean($request->body);
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->user_id = auth()->user()->id;
        $post->image = $fileNameToStore;
        
        $post->save();

        $post->tags()->sync($request->tags, false);

        Session::flash('success', 'Your post was saved successfully!');

        return redirect()->route('posts.show', $post->id)->with('success', 'Your post was saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        
        return view('posts/show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the id of the post
        $post = Post::find($id);
        $categories = Category::all();        
        $cats = [];
        foreach($categories as $category){
            $cats[$category->id] = $category->name;
        }

        $tags = Tag::all();
        $tags2 = [];
        foreach($tags as $tag){
            $tags2[$tag->id] = $tag->name;
        }
        return view('posts/edit')->with('post', $post)->with('categories', $cats)->with('tags', $tags2);
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
       
        //validate the updated blog post data
        $this->validate($request, array(
            'title' => 'required:max:255',
            'slug' => 'required|min:5|max:255|alpha_dash|unique:posts,slug',
            'category_id' => 'required|integer',
            'body' => 'required',
            'image' => 'image|max:1999|mimes:jpeg,jpg,bmp,png,gif'
        ));
        $post = Post::find($id);
        //update the database
        $post->title = $request->input('title');
        $post->body = Purifier::clean($request->input('body'));
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');


        if($request->hasFile('image')){        
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);            
            // Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;                       
            // Upload Image
            $path = $request->file('image')->storeAs('/images', $fileNameToStore);
            
            $oldImage = $post->image;

            $post->image = $fileNameToStore;

            Storage::delete($oldImage);

        }else {
            $fileNameToStore = 'noimage.jpg';
        }

        $post->save();

        if(isset($request->tags)){
            $post->tags()->sync($request->tags);
        }else{
            $post->tags()->sync(array());
        }
        
        Session::flash('success', 'Your post was updated successfully!');

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete a particular post
        $post = Post::find($id);
        $post->tags()->detach();
        Storage::delete($post->image);
        $post->delete();

        Session::flash('success', 'Your post was deleted!');

        return redirect()->route('posts.index');
    }
}
