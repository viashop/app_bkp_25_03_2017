<?php

namespace App\Events\Logs\User;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use stdClass;

/**
 * Class EventActivityRecordUserGenerateNewPassword
 * @package App\Events\Logs\User
 */
class EventActivityRecordUserGenerateNewPassword
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var stdClass
     */
    public $stdClass;


    /**
     * EventActivityRecordUserGenerateNewPassword constructor.
     * @param stdClass $stdClass
     */
    public function __construct(stdClass $stdClass)
    {
        $this->stdClass = $stdClass;
    }

}
