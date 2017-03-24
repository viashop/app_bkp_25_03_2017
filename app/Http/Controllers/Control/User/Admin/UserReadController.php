<?php

namespace App\Http\Controllers\Control\User\Admin;

use App\Authorizations\Gate\CheckGate;
use App\Contracts\Repositories\Control\User\Search\SearchUserAdminRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\Control\User\Admin\UserAdminRepository;
use App\Repositories\Control\User\Search\SearchUserAdminRepository;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;

/**
* Class UserReadController
* @package App\Http\Controllers\Control\User
*/
class UserReadController extends Controller
{

    use CheckGate;

    /**
     * @var int
     */
    protected $perPage = 50;

    /**
     * @var User
     */
    private $user;

    /**
     * @var UserAdminRepository
     */
    private $repository;

    /**
     * @var SearchUserAdminRepository
     */
    private $repository_search;

    /**
     * UserReadController constructor.
     * @param User $user
     * @param UserAdminRepository $repository
     * @param SearchUserAdminRepository $repository_search
     */
    public function __construct(User $user, UserAdminRepository $repository, SearchUserAdminRepository $repository_search)
    {
        $this->user = $user;
        $this->repository = $repository;
        $this->repository_search = $repository_search;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function read(Request $request)
    {

        $this->checkPermission('read_staff_auditor');

        SEOMeta::setTitle('Usuários Administrativos');

        $data['search'] = $request->get('search');

        if (!empty($data['search'])) {

            if ($this->repository_search instanceof SearchUserAdminRepositoryInterface) {
                $data['users'] = $this->repository_search->search($data['search']);
            }

        } else {

            $order = (isset($order)) ? $order : 'id';
            $query = $this->user->with('roles')->where('admin', true);
            $data['users'] = $query->orderBy($order, 'desc')->paginate($this->perPage);

        }

        return view('control.users.admin.read', $data);

    }

    /**
     * @param Request $request
     * @return $this
     */
    public function readTrashed(Request $request)
    {

        $this->checkPermission('read_staff_auditor');

        SEOMeta::setTitle('Usuários Administrativos - Inativos');

        $data['search'] = $request->get('search');

        if (!empty($data['search'])) {

            if ($this->repository_search instanceof SearchUserAdminRepositoryInterface) {
                $data['users'] = $this->repository_search->searchTrashed($data['search']);
            }

        } else {

            $order = (isset($order)) ? $order : 'id';
            $query = $this->user->with('roles')->onlyTrashed()->where('admin', true);
            $data['users'] = $query->orderBy($order, 'desc')->paginate($this->perPage);

        }

        return view('control.users.admin.read-trashed', $data);

    }

}
