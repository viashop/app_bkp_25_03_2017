<?php

namespace App\Listeners\Emails;

use App\Events\Emails\EventNotifyResetPassword;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;

/**
 * Class SendEmailConfirmationNewPassword
 * @package App\Listeners\Emails
 */
class SendEmailConfirmationNewPassword
{

    /**
     * Handle the event.
     *
     * @param  EventNotifyResetPassword  $event
     * @return void
     */
    public function handle(EventNotifyResetPassword $event)
    {

        $subject = Config::get('constants.SUBJECT_RESET_PASSWORD');

        $data = [
            'name' => $event->stdClass->new->name,
            'email' => $event->stdClass->new->email,
            'subject' => $subject
        ];

        Mail::send('email.account.password-has-been-reset', $data, function ($message) use ($event, $subject){
            $message->from( Config::get('mail.from.contact'))
                ->to($event->stdClass->new->email)
                ->subject($subject);
        });

    }

}
