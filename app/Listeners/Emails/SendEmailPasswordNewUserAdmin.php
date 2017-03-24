<?php

namespace App\Listeners\Emails;

use App\Events\Emails\EventNotifyNewUserAdminRegistered;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;

/**
 * Class SendEmailPasswordNewUserAdmin
 * @package App\Listeners\Emails
 */
class SendEmailPasswordNewUserAdmin
{
    /**
     * Handle the event.
     *
     * @param EventNotifyNewUserAdminRegistered $event
     */
    public function handle(EventNotifyNewUserAdminRegistered $event)
    {

        $subject = Config::get('constants.SUBJECT_NEW_USER_ADMIN');

        $data = [
            'name' => $event->stdClass->new->name,
            'email' => $event->stdClass->new->email,
            'password' => $event->stdClass->password,
            'subject' => $subject
        ];

        Mail::send('email.control.password.new-password-user-admin', $data, function ($message) use ($event, $subject) {
            $message->from(Config::get('mail.from.contact'))
                ->to($event->stdClass->new->email)
                ->subject($subject);
        });

    }

}
