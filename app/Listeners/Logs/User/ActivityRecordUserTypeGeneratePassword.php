<?php

namespace App\Listeners\Logs\User;

use App\Events\Logs\User\EventActivityRecordUserGenerateNewPassword;
use App\Models\LogActivityType;
use App\Models\LogActivityUser;
use App\Traits\Headers\RequestHeaders;
use Illuminate\Support\Facades\Auth;

/**
 * Class ActivityRecordUserTypeGeneratePassword
 * @package App\Listeners\Logs\User
 */
class ActivityRecordUserTypeGeneratePassword
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
     * @param  EventActivityRecordUserGenerateNewPassword  $event
     * @return void
     */
    public function handle(EventActivityRecordUserGenerateNewPassword $event)
    {

        $this->log->create([
            'user_id' => Auth::user()->id,
            'reference_new' => json_encode( $event->stdClass->new ),
            'activity_log_type_id' => $this->type->where('name', 'generate-password')->first()->id,
            'reference_table_type' => get_class($event->stdClass->new),
            'request_header' => $this->eventsRequestHeaders(),
        ]);

    }
}
