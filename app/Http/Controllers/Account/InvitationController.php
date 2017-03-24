<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvitationController extends Controller
{


    public function ss()
    {

        SEOMeta::setTitle('Fazer Login');
        SEOMeta::setDescription('Entre com Login e Senha para acessar sua Conta, e gerencie sua Loja Virtual.');
        SEOMeta::setCanonical(route('account.login'));

    }
}
