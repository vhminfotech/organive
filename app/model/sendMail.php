<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use App\model\Sendmail;
use Mail;

class sendMail extends Model {
    
    public function sendSMTPMail($mailData) {
        $pathToFile = $mailData['attachment'];
        $frommail = env('MAIL_USERNAME');
        $mailsend = Mail::send($mailData['template'], ['data' => $mailData['data']], function ($m) use ($mailData, $pathToFile, $frommail) {
                    $m->from($frommail, 'CrudAjax');

                    $m->to($mailData['mailto'], "CrudAjax")->subject($mailData['subject']);
                    if ($pathToFile != "") {
                        // $m->attach($pathToFile);
                    }

                    //  $m->cc($mailData['bcc']);
                });
        if ($mailsend) {
            return true;
        } else {
            return false;
        }
    }
   
}
