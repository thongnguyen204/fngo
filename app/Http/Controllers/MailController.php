<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    //
    public function test(Request $request)
    {
        $input = $request->all();
        Mail::send('mail/mailfb', array('name'=>$input["name"],'email'=>$input["email"], 'content'=>$input['comment']), function($message){
	        $message->to('konannguyen6@gmail.com', 'Thanh Trung')->subject('Test mail Laravel !');
	    });
        // Session::flash('flash_message', 'Send message successfully!');

        return view('mail/welcome');
    }
}