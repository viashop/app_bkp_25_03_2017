<?php

namespace App\Events\Emails;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use stdClass;

/**
 * Class EventNotifyNewUserAdminRegistered
 * @package App\Events\Emails
 */
class EventNotifyNewUserAdminRegistered
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var stdClass
     */
    public $stdClass;

    /**
     * Create a new event instance.
     *
     * EventNotifyNewUserAdminRegistered constructor.
     * @param stdClass $stdClass
     */
    public function __construct(stdClass $stdClass)
    {
        $this->stdClass = $stdClass;
    }

}
