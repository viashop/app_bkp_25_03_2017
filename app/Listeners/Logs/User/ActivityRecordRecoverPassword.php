<?php

namespace App\Listeners\Logs\User;

use App\Events\Logs\User\EventActivityRecordUserRecoverPassword;
use App\Models\LogActivityType;
use App\Models\LogActivityUser;
use App\Traits\Headers\RequestHeaders;

/**
 * Class ActivityRecordRecoverPassword
 * @package App\Listeners\Logs\User
 */
class ActivityRecordRecoverPassword
{

    use RequestHeaders;

    /**
     * @var LogActivityType
     */
    private $type;
    /**
     * @var LogActivityUser
     */
    private $log;

    /**
     * Create the event listener.
     *
     * ActivityRecordRecoverPassword constructor.
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
     * @param  EventActivityRecordUserRecoverPassword  $event
     */
    public function handle(EventActivityRecordUserRecoverPassword $event)
    {

        $this->log->create([
            'user_id' => $event->stdClass->old->id,
            'activity_log_type_id' => $this->type->where('name', 'recover-password')->first()->id,
            'reference_table_type' => get_class($event->stdClass->old),
            'request_header' => $this->eventsRequestHeaders()
        ]);

    }

}