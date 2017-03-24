<?php

namespace App\Http\Controllers\Account\OAuth;

use App\Contracts\Repositories\OAuth\OAuthInterface;
use App\Http\Controllers\Controller;
use App\Repositories\OAuth\GoogleRepository;
use App\Traits\Storage\StorageDataUser;
use Artdarek\OAuth\OAuth;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

/**
 * Class GoogleController
 * @package App\Http\Controllers\Account\OAuth
 */
class GoogleController extends Controller
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
     * @var GoogleRepository
     */
    private $repository;

    /**
     * GoogleController constructor.
     * @param Request $request
     * @param OAuth $oauth
     * @param GoogleRepository $repository
     */
    public function __construct(Request $request, OAuth $oauth, GoogleRepository $repository)
    {
        $this->storageDataUserUrlReturn( $request->get('urlReturn') );
        $this->oauth = $oauth;
        $this->repository = $repository;
    }

    /**
     * Register User
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function register(Request $request)
    {
        $this->register=true;
        return $this->requestOAuth($request);
    }

    /**
     * Authenticate User
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
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
            $code = $request->get('code');

            // get google service
            $googleService = $this->oauth->consumer('Google');

            // check if code is valid

            // if code is provided get user data and sign in
            if ( ! is_null($code))
            {
                // This was a callback request from google, get the token
                $token = $googleService->requestAccessToken($code);

                // Send a request with it
                $result = json_decode($googleService->request('https://www.googleapis.com/oauth2/v1/userinfo'), true);

                if($this->repository instanceof OAuthInterface ) {

                    $data = $this->register === true ? $this->repository->register($result) : $this->repository->authenticate($result);

                    //Create Sessions, Cookies, Redirects Etc...
                    return $this->tokenOAuth($token)->storage($data);

                }

            }
            // if not ask for permission first
            else
            {
                // get googleService authorization
                $url = $googleService->getAuthorizationUri();

                if ($request->input('error') == 'access_denied') {
                    throw new Exception(Config::get('constants.OAUTH_DENIED') );
                }
                // return to google login url
                return redirect((string)$url);
            }


        } catch (Exception $e) {

            return redirect()->route('account.login')->with('message_error', $e->getMessage());

        }

    }

}
