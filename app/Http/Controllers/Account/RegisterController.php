<?php

namespace App\Http\Controllers\Account;

use App\Contracts\Repositories\Account\UserRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Account\RegisterRequest;
use App\Repositories\Account\UserRepository;
use App\Traits\Storage\StorageDataUser;
use Artesaos\SEOTools\Facades\SEOMeta;
use Exception;
use Illuminate\Support\Facades\URL;

/**
 * Class RegisterController
 * @package App\Http\Controllers\Account
 */
class RegisterController extends Controller
{

    use StorageDataUser;

    /**
     * @var UserRepository
     */
    protected $repository;

    /**
     * RegisterController constructor.
     * @param UserRepository $request
     */
    public function __construct(UserRepository $request)
    {
        $this->repository = $request;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function register()
    {

        SEOMeta::setTitle('Criar conta gerenciar Loja Virtual');
        SEOMeta::setDescription('Na vialoja você encontra tudo o que precisa para abrir hoje sua loja virtual e começar a vender.');
        SEOMeta::setCanonical(URL::current());

        return view('account.register');

    }


    /**
     * @param RegisterRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function registerPost(RegisterRequest $request)
    {

        try {

            $request->session()->flash('name', $request->name);
            $request->session()->flash('email', $request->email);

            if ($this->repository instanceof UserRepositoryInterface) {
                $data = $this->repository->registerUser($request);
                return $this->storage($data);
            }

        } catch (Exception $e) {

            return redirect()->back()->with('message_error', $e->getMessage());

        }

    }

}
