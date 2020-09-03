<?php

namespace App\Http\Controllers;

use Mail;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\SendMail;

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
        $mail = $request->input('mail');
        if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
            $firstname = $request->input('firstname');
            $lastname = $request->input('lastname');
            $title = 'Contact '.$firstname.' '.$lastname;
            $content = "Message : {$request->input('message')}";
            $content .= " / Pour reprendre contact : {$mail}";

            $view = 'emails.contact';
            $data = array('fromMail' => $mail,'fromName' => $firstname.' '.$lastname, 'subject' => $title, 'toMail' => 'gitcheckerapp@gmail.com');
            
            try{
                $this->dispatch(new SendMail($view,$title,$content,$data));
                return response()->json(['message' => 'Votre message a bien été envoyé merci']);
            }catch(Exception $e){
                return response()->json(['error' => 'une erreur est survenue lors de l\'envoi']);
            }
        }else{
            return response()->json(['error' => 'Adresse mail invalide']);
        }
    }
}