<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(){
        return view("contact");
    }

    public function sendMessage(Request $request){

       $this->validate($request, [
            "fullname" => "required",
            "email" => "required",
            "subject" => "required",
            "message" => "required",
        ]);

        $details = [
            "fullname" => $request->fullname,
            "email" => $request->email,
            "subject" => $request->subject,
            "message" => $request->message,
        ];

        $sent = Mail::to("tegaonitsha@gmail.com")->send(new ContactMail($details));

        if($sent){
            return back()->with("success", "Thank you for reaching out to us. We have received your message and will get back to you shortly.");
        }else{
            return back()->with("error", "Something went wrong, please try again.");
        }
  
    }


}
