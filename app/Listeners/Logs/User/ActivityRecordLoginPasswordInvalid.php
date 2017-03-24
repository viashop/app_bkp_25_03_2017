<?php

namespace App\Listeners\Logs\User;

use App\Events\Logs\User\EventActivityRecordUserLoginPasswordInvalid;
use App\Models\LogActivityGlobal;
use App\Models\LogActivityType;
use App\Traits\Headers\RequestHeaders;
use Illuminate\Support\Facades\Request;


/**
 * Class ActivityRecordLoginPasswordInvalid
 * @package App\Listeners\Logs\User
 */
class ActivityRecordLoginPasswordInvalid
{

    use RequestHeaders;

    /**
     * @var LogActivityType
     */
    private $type;
    /**
     * @var LogActivityGlobal
     */
    private $log;

    /**
     * Create the event listener.
     *
     * ActivityRecordUserRegistered constructor.
     * @param LogActivityType $type
     * @param LogActivityGlobal $log
     */
    public function __construct(LogActivityType $type, LogActivityGlobal $log)
    {
        $this->type = $type;
        $this->log = $log;
    }

    /**
     * Handle the event.
     *
     * @param  EventActivityRecordUserLoginPasswordInvalid  $event
     */
    public function handle(EventActivityRecordUserLoginPasswordInvalid $event)
    {

        $this->log->create([
            'user_id' => $event->stdClass->new->id,
            'reference_new' => json_encode( $event->stdClass->new ),
            'activity_log_type_id' => $this->type->where('name', 'global-login-password-invalid')->first()->id,
            'reference_table_type' => get_class($event->stdClass->new),
            'request_header' => $this->eventsRequestHeaders(),
            'ip' => Request::ip()
        ]);

    }

}
