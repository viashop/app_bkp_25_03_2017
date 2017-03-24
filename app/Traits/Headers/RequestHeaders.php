<?php

namespace App\Traits\Headers;

use Illuminate\Support\Facades\Request;

/**
 * Class RequestHeaders
 * @package App\Traits\Headers
 */
trait RequestHeaders
{

    /**
     * Get data user headers
     * @return array
     */
    public function eventsRequestHeaders()
    {

        $headers = [];
        $headers['user_agent'] = Request::server('HTTP_USER_AGENT');
        $headers['ip'] = Request::ip();
        $headers['url_referer'] = Request::server('HTTP_REFERER');
        return json_encode( $headers );

    }

}