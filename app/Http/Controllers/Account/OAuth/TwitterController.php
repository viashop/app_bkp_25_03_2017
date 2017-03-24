<?php

namespace App\Http\Controllers\Account\OAuth;

use App\Contracts\Repositories\OAuth\OAuthInterface;
use App\Http\Controllers\Controller;
use App\Repositories\OAuth\TwitterRepository;
use App\Traits\Storage\StorageDataUser;
use Artdarek\OAuth\OAuth;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

/**
 * Class TwitterController
 * @package App\Http\Controllers\Account\OAuth
 */
class TwitterController extends Controller
{

    use StorageDataUser;

    /**
     * @var Request
     */
    private $register = false;

    /**
     * @var OAuth
     */
    private $oauth;

    /**
     * @var TwitterRepository
     */
    private $repository;

    /**
     * GoogleController constructor.
     * @param Request $request
     * @param OAuth $oauth
     * @param TwitterRepository $repository
     */
    public function __construct(Request $request, OAuth $oauth, TwitterRepository $repository)
    {
        $this->storageDataUserUrlReturn( $request->get('urlReturn') );
        $this->oauth = $oauth;
        $this->repository = $repository;
    }


    public function register(Request $request)
    {
        $this->register=true;
        return $this->requestOAuth($request);
    }


    public function authenticate(Request $request)
    {
        return $this->requestOAuth($request);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    private function requestOAuth(Request $request)
    {

        try {

            // !!! Force via Curl !!!
            $this->oauth->setHttpClient('CurlClient');

            // get data from request
            $token  = $request->get('oauth_token');
            $verify = $request->get('oauth_verifier');

            // get twitter service
            $tw = $this->oauth->consumer('Twitter');

            // check if code is valid

            // if code is provided get user data and sign in
            if ( ! is_null($token) && ! is_null($verify))
            {
                // This was a callback request from twitter, get the token
                $token = $tw->requestAccessToken($token, $verify);

                // Send a request with it
                $result = json_decode($tw->request('account/verify_credentials.json'), true);

                if($this->repository instanceof OAuthInterface ) {

                    $data = $this->register === true ? $this->repository->register($result) : $this->repository->authenticate($result);

                    //Create Sessions, Cookies, Redirects Etc...
                    return $this->tokenOAuth($token)->storage($data);

                }

            }
            // if not ask for permission first
            else
            {
                // get request token
                $reqToken = $tw->requestRequestToken();

                // get Authorization Uri sending the request token
                $url = $tw->getAuthorizationUri(['oauth_token' => $reqToken->getRequestToken()]);

                if (!empty($request->input('denied'))) {
                    throw new Exception( Config::get('constants.OAUTH_DENIED') );
                }
                // return to twitter login url
                return redirect((string)$url);
            }

        } catch (Exception $e) {

            return redirect()->route('account.login')->with('message_error', $e->getMessage());

        }

    }

}
