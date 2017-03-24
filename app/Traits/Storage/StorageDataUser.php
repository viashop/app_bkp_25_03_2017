<?php

namespace App\Traits\Storage;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

/**
 * Class StorageDataUser
 * @package App\Traits\Storage
 */
trait StorageDataUser
{

    /**
     * @var
     */
    private $url;
    /**
     * @var bool
     */
    private $user_id = false;

    /**
     * @var
     */
    public $token;

    /**
     * Get Token OAuth
     * @param mixed $token
     * @return StorageDataUser
     */
    public function tokenOAuth($token)
    {
        $this->token = $token;
        return $this;
    }


    /**
     * @param $url
     */
    public function storageDataUserUrlReturn($url)
    {
        if (!empty($url)) {
            Session::flash('url_return_user', urldecode($url));
        }

    }

    /**
     * Create Session, Cookies e Redirect
     * @param null $data
     */
    public function storage($data)
    {
        //Array OAuth
        if (isset($data->user_id) && is_numeric($data->user_id)) {
            $this->user_id = $data->user_id;
        } else {
            $this->user_id = $data->id;
        }

        if ($data->admin) {
            $this->url = '/painel';
        } else {
            $this->url = '/admin';
        }

        if (Session::exists('url_return_user')) {
            $this->url = session('url_return_user');
        }

        Session::flush();
        Session::regenerate();
        Auth::logout();
        Auth::loginUsingId($this->user_id);
        Session::flash('redirect_user_login', $this->url);
        return redirect()->route('account.login')->with('message_success_login', true);


    }

}
