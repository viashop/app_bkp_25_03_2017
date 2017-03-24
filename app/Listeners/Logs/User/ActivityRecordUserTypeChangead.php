<?php

namespace App\Listeners\Logs\User;

use App\Events\Logs\User\EventActivityRecordUserTypeChangead;
use App\Models\LogActivityType;
use App\Models\LogActivityUser;
use App\Traits\Headers\RequestHeaders;
use Illuminate\Support\Facades\Auth;

class ActivityRecordUserTypeChangead
{

    use RequestHeaders;

    private $type;
    private $log;

    /**
     * Create the event listener.
     *
     * ActivityRecordUserRegistered constructor.
     * @param LogActivityType $type
     * @param LogActivityUser $log
     */
    public function __construct(LogActivityType $type, LogActivityUser $log)
    {
        $this->type = $type;
        $this->log = $log;
    }

    /**
     * Handle the event.
     *
     * @param  EventActivityRecordUserTypeChangead $event
     * @return void
     */
    public function handle(EventActivityRecordUserTypeChangead $event)
    {

        $this->log->create([
            'user_id' => Auth::user()->id,
            'reference_old' => json_encode(isset($event->stdClass->old) ? $event->stdClass->old : null),
            'reference_new' => json_encode(isset($event->stdClass->new) ? $event->stdClass->new : null),
            'activity_log_type_id' => $this->type->where('name', 'changead')->first()->id,
            'reference_table_type' => get_class(isset($event->stdClass->new) ? $event->stdClass->new : null),
            'request_header' => $this->eventsRequestHeaders(),
        ]);

    }

}
