<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan;

class AuditController extends Controller
{
    public function audit(Request $request) 
    {
        $mail = $request->input('mail');
        $link = $request->input('link');
        $exitCode = Artisan::call('execute:analyser', [
            'link' => $link
        ]);
        return $mail.' '.$link;
    }
}
