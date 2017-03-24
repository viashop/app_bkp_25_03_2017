<?php

namespace App\Events\Emails;

use App\Http\Requests\Account\RecoverPasswordRequest;
use App\Models\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use stdClass;

/**
 * Class EventNotifyUserRecoverPassword
 * @package App\Events\Emails
 */
class EventNotifyUserRecoverPassword
{

    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var stdClass
     */
    public $stdClass;

    /**
     * Create a new event instance.
     *
     * EventNotifyUserRecoverPassword constructor.
     * @param stdClass $stdClass
     */
    public function __construct(stdClass $stdClass)
    {
        $this->stdClass = $stdClass;
    }

}
