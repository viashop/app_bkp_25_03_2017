<?php

namespace App\Http\Controllers\Account;

use App\Contracts\Repositories\Account\RecoverPasswordRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Account\ResetPasswordRequest;
use App\Repositories\Account\RecoverPasswordRepository;
use Artesaos\SEOTools\Facades\SEOMeta;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;


/**
 * Class ResetPasswordController
 * @package App\Http\Controllers\Account
 */
class ResetPasswordController extends Controller
{
    /**
     * @var RecoverPasswordRepository
     */
    private $repository;

    /**
     * ResetPasswordController constructor.
     * @param RecoverPasswordRepository $repository
     */
    public function __construct(RecoverPasswordRepository $repository)
    {

        $this->repository = $repository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function reset(Request $request)
    {

        SEOMeta::setTitle('Redefinição de senha!');

        $token = $request->route('token');

        if ($this->repository instanceof RecoverPasswordRepositoryInterface) {

            if (!$this->repository->isTokenResetPassord($request)) {

                $request->session()->flash('message_error_reset_password', Config('constants.TOKEN_INVALID_OR_NOT_FOUND'));

            }

        }

        return view('account.reset-password', compact('token')) ;
    }


    /**
     * @param ResetPasswordRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function resetPost(ResetPasswordRequest $request)
    {

        try {

            if ($this->repository instanceof RecoverPasswordRepositoryInterface) {

                if (!$this->repository->isTokenResetPassord($request)) {
                    throw new Exception(Config::get('constants.ERROR_PROCESS'));
                }

                $this->repository->resetPassword($request);
            }

            return redirect()->route('account.login')->with('message_success_reset_password', Config::get('constants.PASSWORD_CHANGE'));

        } catch (Exception $e) {

            return redirect()->back()->with('message_error', $e->getMessage());

        }

    }

}
