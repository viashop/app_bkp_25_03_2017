<?php

namespace App\Http\Controllers\Control\User\Shop;


use App\Contracts\Repositories\Control\User\Search\SearchUserShopRepositoryInterface;
use App\Contracts\Repositories\Control\User\Shop\UserShopRepositoryInterface;
use App\Repositories\Control\User\Search\SearchUserShopRepository;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Control\User\Shop\UserShopRepository;
use App\Authorizations\Gate\CheckGate;

/**
* Class UserReadController
* @package App\Http\Controllers\Control\User
*/
class UserReadController extends Controller
{

    use CheckGate;

    /**
     * @var UserShopRepository
     */
    private $repository;

    /**
     * @var SearchUserShopRepository
     */
    private $repository_search;

    /**
     * UserReadController constructor.
     * @param UserShopRepository $repository
     * @param SearchUserShopRepository $repository_search
     */
    public function __construct(UserShopRepository $repository, SearchUserShopRepository $repository_search)
    {
        $this->repository = $repository;
        $this->repository_search = $repository_search;
    }

    /**
    * @param Request $request
    * @return $this
    */
    public function readAdmin(Request $request)
    {

        $this->checkPermission('read_staff_support');

        SEOMeta::setTitle('Usuários Administrativos');

        $data['type'] = 'shop_admin';
        $data['search'] = $request->get('search');
        $data['users'] = $this->filterRepository($data['search'], $data['type']);
        return view('control.users.shops.read', $data);

    }

    /**
    * @param Request $request
    * @return $this
    */
    public function readEditor(Request $request)
    {

        $this->checkPermission('edit_staff_support');

        SEOMeta::setTitle('Usuários Editores');

        $data['type'] = 'shop_editor';
        $data['search'] = $request->get('search');
        $data['users'] = $this->filterRepository($data['search'], $data['type']);
        return view('control.users.shops.read', $data);


    }

    /**
     * @param $search
     * @param $type
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    protected function filterRepository($search, $type)
    {
        if (!empty($search)) {

            if ($this->repository_search instanceof SearchUserShopRepositoryInterface) {
                return $this->repository_search->search($search, $type);
            }

        } else {

            if ($this->repository instanceof UserShopRepositoryInterface) {
                return $this->repository->getAll($type);
            }

        }

    }

}
