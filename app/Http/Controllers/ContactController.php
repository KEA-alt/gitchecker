<?php

namespace App\Http\Controllers;

use Mail;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    /**
     * Send an e-mail reminder to the user.
     * @param  Request  $request
     * @param  string  $firstname
     * @param  string  $lastname
     * @param  string  $mail
     * @param  string  $message
     * @return Response
     */
    public function sendEmail(Request $request)
    {
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $title = 'Contact '.$firstname.' '.$lastname;
        $content = $request->input('message');
        $mail = $request->input('mail');

        $data = array( 'email' => $mail, 'firstname' => $firstname, 'lastname' => $lastname, 'subject' => $title);
        
        try{
            Mail::send('emails.send', ['title' => $title, 'content' => $content], function ($m) use ($data)
            {
                $m->from($data['email'], $data['firstname'].' '.$data['lastname']);

                $m->subject($data['subject']);

                $m->to('gitcheckerapp@gmail.com');
            });
            return response()->json(['message' => 'Request completed']);
        }catch(Exception $e){
            return response()->json(['error' => 'Request error']);
        }
    }
}