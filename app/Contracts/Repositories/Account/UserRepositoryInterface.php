<?php


namespace App\Contracts\Repositories\Account;


use App\Http\Requests\Account\LoginRequest;
use App\Http\Requests\Account\RegisterRequest;

interface UserRepositoryInterface
{

    public function autheticateUser(LoginRequest $request);

    public function registerUser(RegisterRequest $request);

}