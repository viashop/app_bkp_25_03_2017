<?php


namespace App\Contracts\Repositories\OAuth;


/**
 * Interface OAuthInterface
 * @package App\Contracts\Repositories\OAuth
 */
interface OAuthInterface
{

    public function register(array $data);
    public function authenticate(array $data);
}
