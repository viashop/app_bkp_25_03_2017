<?php

namespace App\Listeners\Emails;

use App\Events\Emails\EventNotifyNewPasswordGenerateUser;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;

/**
 * Class SendEmailNewPasswordUser
 * @package App\Listeners\Emails
 */
class SendEmailNewPasswordUser
{

    /**
     * Handle the event.
     *
     * @param EventNotifyNewPasswordGenerateUser $event
     */
    public function handle(EventNotifyNewPasswordGenerateUser $event)
    {

        $subject = Config::get('constants.SUBJECT_NEW_PASSWORD');

        $data = [
            'name' => $event->stdClass->new->name,
            'email' => $event->stdClass->new->email,
            'password' => $event->stdClass->password,
            'subject' => $subject
        ];

        Mail::send('email.control.password.new-password-user', $data, function ($message) use ($event, $subject) {
            $message->from( Config::get('mail.from.contact') )
                ->to($event->stdClass->new->email)
                ->subject($subject);
        });

    }

}
