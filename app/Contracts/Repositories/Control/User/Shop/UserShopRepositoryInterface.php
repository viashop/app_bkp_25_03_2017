<?php


namespace App\Contracts\Repositories\Control\User\Shop;


use App\Http\Requests\Control\User\ShopUserRequest;

interface UserShopRepositoryInterface
{

    public function getUser($value);

    public function updatePost(ShopUserRequest $request);

    public function getAll($type, $order = null);


}