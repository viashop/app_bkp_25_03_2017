<?php


namespace App\Contracts\Repositories\Account;


use App\Http\Requests\Account\RecoverPasswordRequest;
use App\Http\Requests\Account\ResetPasswordRequest;
use Illuminate\Http\Request;

interface RecoverPasswordRepositoryInterface
{

    public function isTokenResetPassord(Request $request);

    public function recoverPassword(RecoverPasswordRequest $request);

    public function resetPassword(ResetPasswordRequest $request);

}