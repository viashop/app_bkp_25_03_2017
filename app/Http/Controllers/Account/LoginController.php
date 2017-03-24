<?php

namespace App\Http\Controllers\Account;

use App\Contracts\Repositories\Account\UserRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Account\LoginRequest;
use App\Repositories\Account\UserRepository;
use App\Traits\Storage\StorageDataUser;
use Artesaos\SEOTools\Facades\SEOMeta;
use Exception;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;

/**
 * Class LoginController
 * @package App\Http\Controllers\Account
 */
class LoginController extends Controller
{

    use StorageDataUser;

    /**
     * @var UserRepository
     */
    protected $repository;

    /**
     * LoginController constructor.
     * @param Request $request
     * @param UserRepository $repository
     */
    public function __construct(Request $request, UserRepository $repository)
    {
        $this->storageDataUserUrlReturn( $request->get('urlReturn') );
        $this->repository = $repository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        SEOMeta::setTitle('Fazer Login');
        SEOMeta::setDescription('Entre com Login e Senha para acessar sua Conta, e gerencie sua Loja Virtual.');
        SEOMeta::setCanonical(URL::current());

        return view('account.login');
    }

    /**
     * Authenticate User
     * @param LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authenticate(LoginRequest $request)
    {

        try {

            if ($this->repository instanceof UserRepositoryInterface) {
                $data = $this->repository->autheticateUser($request);
                return $this->storage($data);
            }

        } catch (Exception $e) {

            return redirect()->back()->with('message_error', $e->getMessage());

        }

    }

}
