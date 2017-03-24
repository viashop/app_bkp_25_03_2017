<?php

namespace App\Events\Logs\User;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use stdClass;

/**
 * Class EventActivityRecordUserLoginPasswordInvalid
 * @package App\Events\Logs\User
 */
class EventActivityRecordUserLoginPasswordInvalid
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var stdClass
     */
    public $stdClass;


    /**
     * EventActivityRecordUserLoginPasswordInvalid constructor.
     * @param stdClass $stdClass
     */
    public function __construct(stdClass $stdClass)
    {
        $this->stdClass = $stdClass;
    }

}
