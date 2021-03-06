<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use App\Jobs\ExecuteAudit;
use App\Jobs\SendMail;

class AuditController extends Controller
{
    /**
     * Call the execute of the security audit.
     * @param  Request  $request
     * @return Response
     */
    public function audit(Request $request){
        $mail = $request->input('mail');
        $link = $request->input('link');
        if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
            if($this->checkGitLink($link)){
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
                    return response()->json(['message' => 'Votre code est en cours d\'analyse. Vous recevrez bientôt les résultats par mail']);
                }catch(Exception $e){
                    return response()->json(['error' => $e]);
                }
            }else{
                return response()->json(['error' => 'URL Github invalide']);
            }
        }else{
            return response()->json(['error' => 'Adresse mail invalide']);
        }
    }

    /**
     * Generate the report ID.
     * @param  string  $link
     * @return string
     */
    private static function generateReportId($link){
        //recuperation des variables
        $part = explode("/", $link);
        $username = $part[3];
        $reponame = $part[4];
        $randInt = bin2hex(random_bytes(4));
        $rand = str_shuffle(str_replace(".", "",$reponame.$username.$randInt));

        return $rand;
    }

    /**
     * Get the repositorie name from the link.
     * @param  string  $link
     * @return string
     */
    private static function getRepoName($link){
        $part = explode("/", $link);
        $reponame = $part[4];

        return $reponame;
    }

    /**
     * Check if the URL is a real Github URL
     * @param  string  $url
     * @return bool
     */
    private static function checkGitLink($url){
        if(strpos($url, 'github.com') != false){
            if(filter_var($url, FILTER_VALIDATE_URL)) {
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}
