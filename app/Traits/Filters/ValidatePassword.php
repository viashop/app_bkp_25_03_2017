<?php

namespace App\Traits\Filters;


use Illuminate\Support\Facades\Config;
use Respect\Validation\Validator as v;

/**
 * Class ValidatePassword
 * @package App\Traits\Filters
 */
trait ValidatePassword
{

    /**
     * Is Password Valid
     * @param $password
     * @return $this
     */
    public function isPasswordValid($password)
    {

        if (!v::noWhitespace()->validate($password)) {
            throw new \InvalidArgumentException(Config::get('constants.NO_WHITE_SPACE'));
        }

        if (!validate_is_weak_password($password)) {
            throw new \InvalidArgumentException(Config::get('constants.WEAK_PASSWORD'));
        }

        if (!validate_is_passwd($password)) {
            throw new \InvalidArgumentException(Config::get('constants.PASSWORD_IS_CURT'));
        }

        if(!v::stringType()->notEmpty()->validate($password)) {
            throw new \InvalidArgumentException(Config::get('constants.PLEASE_ENTER_PASSWORD_VALID'));
        }

    }

}
