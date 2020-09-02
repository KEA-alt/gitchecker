<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use App\Jobs\ExecuteAudit;
use App\Jobs\SendMail;

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
            $this->dispatch(new ExecuteAudit($link,$rand,$reponame));
            $view = 'emails.audit';
            $title = "Le résultat de votre analyse de sécurité sur ".$reponame;
            $data = array('fromMail' => 'gitcheckerapp@gmail.com','fromName' => 'Gitchecker App', 'subject' => $title, 'toMail' => $mail);
            $this->dispatch(new SendMail($view,$title,$rand,$data));
            return response()->json(['message' => 'Request completed']);
        }catch(Exception $e){
            return response()->json(['error' => $e]);
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
