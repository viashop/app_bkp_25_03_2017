<?php

namespace App\Listeners\Logs\User;

use App\Events\Logs\User\EventActivityRecordUserLoginInvalid;
use App\Models\LogActivityGlobal;
use App\Models\LogActivityType;
use App\Traits\Headers\RequestHeaders;
use Illuminate\Support\Facades\Request;

/**
 * Class ActivityRecordUserLoginInvalid
 * @package App\Listeners\Logs\User
 */
class ActivityRecordUserLoginInvalid
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
     * @param  EventActivityRecordUserLoginInvalid $event
     */
    public function handle(EventActivityRecordUserLoginInvalid $event)
    {

        $this->log->create([
            'reference_new' => json_encode( $event->stdClass->new ),
            'activity_log_type_id' => $this->type->where('name', 'global-login-invalid')->first()->id,
            'request_header' => $this->eventsRequestHeaders(),
            'ip' => Request::ip()
        ]);

    }

}
