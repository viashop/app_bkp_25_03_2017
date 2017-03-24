<?php


namespace App\Contracts\Repositories\Control\User\Search;


interface SearchUserAdminRepositoryInterface
{

    public function search($search);

    public function searchTrashed($search);

}