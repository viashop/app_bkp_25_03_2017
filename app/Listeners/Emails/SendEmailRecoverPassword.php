<?php

namespace App\Listeners\Emails;

use App\Events\Emails\EventNotifyUserRecoverPassword;
use Exception;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;

/**
 * Class SendEmailRecoverPassword
 * @package App\Listeners\Emails
 */
class SendEmailRecoverPassword
{

    /**
     * Handle the event.
     * @param EventNotifyUserRecoverPassword $event
     * @throws Exception
     */
    public function handle(EventNotifyUserRecoverPassword $event)
    {

        $subject = Config::get('constants.SUBJECT_RECOVER_PASSWORD');

        $data = [
            'name' => $event->stdClass->old->name,
            'email' => $event->stdClass->old->email,
            'subject' => $subject,
            'token' => $event->stdClass->new->token,
            'issued' => tools_issued_date(),
        ];

        $send = Mail::send('email.account.recover-password', $data, function ($message) use ($event, $subject){
            $message->from( Config::get('mail.from.contact') )
                ->to($event->stdClass->old->email)
                ->subject($subject);
        });

        if (!is_null($send)) {
            throw new Exception( Config::get('constants.ERROR_PROCCESS') );
        }

    }

}
