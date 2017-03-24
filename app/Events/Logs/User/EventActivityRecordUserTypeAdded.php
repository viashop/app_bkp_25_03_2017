<?php

namespace App\Events\Logs\User;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use stdClass;

class EventActivityRecordUserTypeAdded
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $stdClass;

    /**
     * EventActivityRecordUserTypeChangead constructor.
     * @param stdClass $stdClass
     */
    public function __construct(stdClass $stdClass)
    {
        $this->stdClass = $stdClass;
    }
}
