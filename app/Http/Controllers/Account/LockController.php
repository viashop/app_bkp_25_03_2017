<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LockController extends Controller
{
    public function lock()
    {

        SEOMeta::setTitle('Fazer Login');
        SEOMeta::setDescription('Entre com Login e Senha para acessar sua Conta, e gerencie sua Loja Virtual.');
        SEOMeta::setCanonical(route('account.login'));
        return view('account.lock');
    }
}
