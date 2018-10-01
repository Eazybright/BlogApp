<?php

namespace App\Http\Controllers;

use App\Post;
use Session;
use Mail;
use App\Mail\WelcomeMail;
use Illuminate\contractl\Mailer;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function getIndex(){
        $post = Post::orderBy('created_at', 'desc')->limit(4)->get();
        return view('welcome')->with('post', $post);
    }

    public function getAbout(){
        return view('pages/about');
    }
    
    public function index(){
        return view('index');
    }
    public function getContact(){
        return view('pages/contact');
    }
    
    public function postContact(Request $request){
        $this->validate($request, array(
            'email' => 'required|email',
            'message' => 'min:10',
            'subject' => 'min:3',
        ));
        $data = [
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message,
        ];
        Mail::send('emails/contact', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('doneazy911@gmail.com');
            $message->subject($data['subject']);
        });
        Session::flash('success', 'Your email was sent successfully');

        return redirect('/')->with('sucess', 'Your email has been sent successfully');
    }
}
