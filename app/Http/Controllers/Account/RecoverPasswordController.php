<?php

namespace App\Http\Controllers\Account;

use App\Contracts\Repositories\Account\RecoverPasswordRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Account\RecoverPasswordRequest;
use App\Repositories\Account\RecoverPasswordRepository;
use App\Repositories\Account\UserRepository;
use Artesaos\SEOTools\Facades\SEOMeta;
use Exception;
use Illuminate\Support\Facades\URL;

/**
 * Class RecoverPasswordController
 * @package App\Http\Controllers\Account
 */
class RecoverPasswordController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $repository;

    /**
     * RecoverPasswordController constructor.
     * @param RecoverPasswordRepository $repository
     */
    public function __construct(RecoverPasswordRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function recover()
    {

        SEOMeta::setTitle('Recuperar Senha');
        SEOMeta::setDescription('Entre com Login e Senha para acessar sua Conta, e gerencie sua Loja Virtual.');
        SEOMeta::setCanonical(URL::current());

        return view('account.recover-password');
    }

    /**
     * @param RecoverPasswordRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function recoverPost(RecoverPasswordRequest $request)
    {
        try {

            if ($this->repository instanceof RecoverPasswordRepositoryInterface) {
                $this->repository->recoverPassword($request);
                return redirect()->route('account.recover.notice');
            }

        } catch (Exception $e) {

            return redirect()->route('account.recover');

        }

    }

    /**
     * @return $this
     */
    public function notice()
    {

        SEOMeta::setTitle('Recuperação da senha solicitada!');
        SEOMeta::setDescription('Para finalizar a recuperação da senha você deve seguir os passos que estão no email recebido.');
        SEOMeta::setCanonical(URL::current());

        return view('account.recover-password-notice');
    }

}
