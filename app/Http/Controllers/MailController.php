<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\TestEmail;
use Session;

class MailController extends Controller
{
    public function getContact()
    {
        return view('pages/contact');
    }
    
    public function SendMail(Request $request)
    {
        Mail::send(new ContactMail($request));

        Session::flash('success', 'Email sent!');
        
        return redirect('/');
    }

    public function sendEmail()
    {
        $data = ['message' => 'This is a test!'];
        Session::flash('success', 'Email sent');

        Mail::to('doneazy911@gmail.com')->send(new TestEmail($data));
    }
    
}
