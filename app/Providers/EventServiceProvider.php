<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [


        //+++++++++++++++++++++++++++++++++++++
        //---------- Logs in Database ---------
        //+++++++++++++++++++++++++++++++++++++
        'App\Events\Logs\User\EventActivityRecordUserLoginInvalid' => [
            'App\Listeners\Logs\User\ActivityRecordUserLoginInvalid',
        ],

        'App\Events\Logs\User\EventActivityRecordUserLoginPasswordInvalid' => [
            'App\Listeners\Logs\User\ActivityRecordLoginPasswordInvalid',
        ],

        'App\Events\Logs\User\EventActivityRecordUserLogged' => [
            'App\Listeners\Logs\User\ActivityRecordUserLogged',
        ],

        'App\Events\Logs\User\EventActivityRecordUserRegistered' => [
            'App\Listeners\Logs\User\ActivityRecordUserRegistered',
        ],

        'App\Events\Logs\User\EventActivityRecordUserResetPassword' => [
            'App\Listeners\Logs\User\ActivityRecordResetPassword',
        ],

        'App\Events\Logs\User\EventActivityRecordUserTypeAdded' => [
            'App\Listeners\Logs\User\ActivityRecordUserTypeAdded',
        ],

        'App\Events\Logs\User\EventActivityRecordUserTypeChangead' => [
            'App\Listeners\Logs\User\ActivityRecordUserTypeChangead',
        ],

        'App\Events\Logs\User\EventActivityRecordUserTypeRemoved' => [
            'App\Listeners\Logs\User\ActivityRecordUserTypeRemoved',
        ],

        'App\Events\Logs\User\EventActivityRecordUserGenerateNewPassword' => [
            'App\Listeners\Logs\User\ActivityRecordUserTypeGeneratePassword',
        ],

        'App\Events\Logs\User\EventActivityRecordUserRecoverPassword' => [
            'App\Listeners\Logs\User\ActivityRecordRecoverPassword',
        ],

        //+++++++++++++++++++++++++++++++++++++
        //------------ Send Emails ------------
        //+++++++++++++++++++++++++++++++++++++
        'App\Events\Emails\EventNotifyNewUserRegistered' => [
            'App\Listeners\Emails\SendEmailConfirmationCode',
        ],

        'App\Events\Emails\EventNotifyUserRecoverPassword' => [
            'App\Listeners\Emails\SendEmailRecoverPassword',
        ],

        'App\Events\Emails\EventNotifyResetPassword' => [
            'App\Listeners\Emails\SendEmailConfirmationNewPassword',
        ],

        'App\Events\Emails\EventNotifyNewUserAdminRegistered' => [
            'App\Listeners\Emails\SendEmailPasswordNewUserAdmin',
        ],

        'App\Events\Emails\EventNotifyNewPasswordGenerateUser' => [
            'App\Listeners\Emails\SendEmailNewPasswordUser',
        ],

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
