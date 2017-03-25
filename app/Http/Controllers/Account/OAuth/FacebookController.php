<?php

namespace App\Http\Controllers\Account\OAuth;

use App\Contracts\Repositories\OAuth\OAuthInterface;
use App\Http\Controllers\Controller;
use App\Repositories\OAuth\FacebookRepository;
use App\Traits\Storage\StorageDataUser;
use Artdarek\OAuth\OAuth;
use Exception;
use InvalidArgumentException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

/**
 * Class FacebookController
 * @package App\Http\Controllers\Account\OAuth
 */
class FacebookController extends Controller
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
     * @var FacebookRepository
     */
    private $repository;

    /**
     * GoogleController constructor.
     * @param Request $request
     * @param OAuth $oauth
     * @param FacebookRepository $repository
     */
    public function __construct(Request $request, OAuth $oauth, FacebookRepository $repository)
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


            // get fb service
            $fb = $this->oauth->consumer('Facebook');

            // check if code is valid

            // if code is provided get user data and sign in
            if (!is_null($code)) {

                // This was a callback request from facebook, get the token
                $token = $fb->requestAccessToken($code);

                // Send a request with it
                $result = json_decode($fb->request('/me?locale=pt_BR&fields=id,name,email,gender,locale,link,age_range,cover,picture,timezone,updated_time'), true);

                if($this->repository instanceof OAuthInterface ) {

                    $data = $this->register === true ? $this->repository->register($result) : $this->repository->authenticate($result);

                    //Create Sessions, Cookies, Redirects Etc...
                    return $this->tokenOAuth($token)->storage($data);

                }


            } // if not ask for permission first
            else {

                // get fb authorization
                $url = $fb->getAuthorizationUri();

                if ($request->input('error') == 'access_denied') {
                    throw new InvalidArgumentException( Config::get('constants.OAUTH_DENIED') );
                }

                return redirect((string)$url);
            }

        } catch (InvalidArgumentException $e) {

            return redirect()->route('account.login')->with('message_error', $e->getMessage());

        } catch (Exception $e) {

            return redirect()->route('account.login')->with('message_error', Config::get('constants.ERROR_PROCESS_OAUTH'));

        }

    }

}
