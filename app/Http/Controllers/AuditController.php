<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use Artisan;

class AuditController extends Controller
{
    public function audit(Request $request){
        $mail = $request->input('mail');
        $link = $request->input('link');
        if(substr($link, -4) == ".git"){
            $link = substr($link, 0, -4);
        }
        $rand = $this->generateReportId($link);
        $reponame = $this->getRepoName($link);
        try{
            $exitCode = Artisan::call('execute:analyser', [
                'link' => $link,
                'rand' => $rand,
                'reponame' => $reponame
            ]);
            $this->sendAuditMail($mail, $link, $rand, $reponame);
            return response()->json(['message' => 'Request completed']);
        }catch(Exception $e){
            return response()->json(['error' => $e]);
        }
    }

    private static function sendAuditMail($mail, $link, $rand, $reponame){
        $title = "Le résultat de votre analyse de sécurité sur ".$reponame;
        $data = array( 'email' => $mail, 'subject' => $title);
        try{
            Mail::send('emails.audit', ['title' => $title, 'rand' => $rand], function ($m) use ($data)
            {
                $m->from('gitcheckerapp@gmail.com', 'Gitchecker App');

                $m->subject($data['subject']);

                $m->to($data['email']);
            });
            return response()->json(['message' => 'Request completed']);
        }catch(Exception $e){
            return response()->json(['error' => 'Request error']);
        }
    }

    private static function generateReportId($link){
        //recuperation des variables
        $part = explode("/", $link);
        $username = $part[3];
        $reponame = $part[4];
        $randInt = bin2hex(random_bytes(4));
        $rand = str_shuffle(str_replace(".", "",$reponame.$username.$randInt));

        return $rand;
    }

    private static function getRepoName($link){
        $part = explode("/", $link);
        $reponame = $part[4];

        return $reponame;
    }
}
