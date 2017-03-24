<?php

namespace App\Http\Controllers\Control;

use App\Http\Controllers\Controller;
use App\Models\User;
use Artesaos\SEOTools\Facades\SEOMeta;
use App\Authorizations\Gate\CheckGate;

/**
 * Class DashboardController
 * @package App\Http\Controllers\Control
 */
class DashboardController extends Controller
{

    use CheckGate;

    /**
     * @var User
     */
    protected $user;

    /**
     * DashboardController constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return $this
     */
    public function dashboard()
    {

        SEOMeta::setTitle('Dashboard - Painel de Controle');

        $count_users = tools_convert_to_decimal_br($this->user->count(),0);

        return view('control.dashboard')->with( compact('count_users' ) );

    }

}
