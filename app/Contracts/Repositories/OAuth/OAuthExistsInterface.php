<?php


namespace App\Contracts\Repositories\OAuth;


/**
 * Interface OAuthExistsInterface
 * @package App\Repositories\OAuth
 */
interface OAuthExistsInterface
{
    public function existsOAuthID($value);
}