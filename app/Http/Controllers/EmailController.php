<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\TestMail;
class EmailController extends Controller
{
    public function send_email()
    {
        $mailData = [
            'title' => 'Mail from Laravel 9',
            'body' => 'This is for testing email using smtp.'
        ];

        Mail::to('m.nakharin@gmail.com')->send(new TestMail($mailData));

        dd("Email is sent successfully.");

      
    }
}
