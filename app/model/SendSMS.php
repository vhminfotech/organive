<?php

namespace App\model;
use App\model\sendmail;

use Illuminate\Database\Eloquent\Model;

class SendSMS extends Model {

    public function sendMailltesting($request) {

        $mailData['data'] = $request;
        $mailData['subject'] = 'CrudAjax || Registration Successful';
        $mailData['attachment'] = array();
        $mailData['template'] = "email.contactus";
        $mailData['mailto'] = $request->input('email');
        $sendMail = new sendmail;
        return $sendMail->sendSMTPMail($mailData);
    }

}
