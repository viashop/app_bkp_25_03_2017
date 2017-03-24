@php
    $email = Auth::user()->email;
    $faker = Faker\Factory::create();
    $email = ( !empty( $email ) ) ? $email  : $faker->email;
@endphp

<div class="sidebar-wrapper">
    <div class="user">
        <div class="photo">
            <img src="{{ Gravatar::get($email) }}" />
        </div>
        <div class="info">
            <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                {{ Auth::user()->name }}
                <b class="caret"></b>
            </a>
            <div class="collapse" id="collapseExample">
                <ul class="nav">
                    <li><a href="{{ route('control.users.personal.read') }}" id="control-users-personal-read">Dados Pessoais</a></li>
                    {{-- <li><a href="#">Editar Perfil</a></li> --}}
                    {{-- <li><a href="#">Editar Perfil</a></li> --}}
                    {{-- <li><a href="#">Configurações</a></li> --}}

                </ul>
            </div>
        </div>
    </div>

    <ul class="nav">

        <li class="{{ Request::is('painel') ? 'active': null }}">
            <a href="{{ route('control.dashboard') }}">
                <i class="fa fa-dashboard"></i>
                <p>Dashboard</p>
            </a>
        </li>

        @can('read_staff_auditor')

        <li class="{{ Request::is('painel/shop/*') ? 'active': null }}">
            <a data-toggle="collapse" href="#shops">
                <i class="fa fa-heart" aria-hidden="true"></i>
                <p>Shops
                    <b class="caret"></b>
                </p>
            </a>
            <div class="collapse {{ Request::is('painel/shop/*') ? 'in': null }}" id="shops">
                <ul class="nav">
                    <li class="{{ Request::is('painel/shop/xyz*') ? 'active': null }}"><a href="{{ url('/painel/shop') }}">Loja Virtual</a></li>
                    <li class="{{ Request::is('painel/shop/user/admin*') ? 'active': null }}"><a href="{{ route('control.users.shops.admin.read') }}" id="control-users-shops-admin-read">Administrador (Loja)</a></li>
                    <li class="{{ Request::is('painel/shop/user/editor*') ? 'active': null }}"><a href="{{ route('control.users.shops.editor.read') }}" id="control-users-shops-editor-read">Editor (Loja)</a></li>
                </ul>
            </div>
        </li>
        @endcan

        @can('read_staff_finance')
        <li>
            <a data-toggle="collapse" href="#finance">
                <i class="fa fa-usd" aria-hidden="true"></i>

                <p>Financeiro
                    <b class="caret"></b>
                </p>
            </a>
            <div class="collapse" id="finance">
                <ul class="nav">
                    <li><a href="{{ url('/painel/role') }}">Faturas</a></li>
                    <li><a href="{{ url('/painel/role') }}">Faturas vencidas</a></li>
                    <li><a href="{{ url('/painel/role') }}">Faturas pendentes</a></li>
                    <li><a href="{{ url('/painel/role') }}">Faturas em aberto</a></li>
                </ul>
            </div>
        </li>

        <li>
            <a data-toggle="collapse" href="#plans">
                <i class="fa fa-bar-chart" aria-hidden="true"></i>
                <p>Planos
                    <b class="caret"></b>
                </p>
            </a>
            <div class="collapse" id="plans">
                <ul class="nav">
                    <li><a href="{{ url('/painel/role') }}">Faturas</a></li>
                    <li><a href="{{ url('/painel/role') }}">Faturas vencidas</a></li>
                    <li><a href="{{ url('/painel/role') }}">Faturas pendentes</a></li>
                    <li><a href="{{ url('/painel/role') }}">Faturas em aberto</a></li>
                </ul>
            </div>
        </li>
        @endcan

        @can('read_affiliate')
        <li>
            <a href="{{ url('/painel/affiliates') }}">
                <i class="fa fa fa-telegram"></i>
                <p>Afiliados</p>
            </a>
        </li>
        @endcan

        @can('read_staff_support')
        <li>
            <a href="{{ url('/painel/ticket') }}">
                <i class="fa fa-ticket"></i>
                <p>Help Desk</p>
            </a>
        </li>
        @endcan

        @can('read_staff_auditor')
        <li class="{{ Request::is('painel/user*') ? 'active': null }}">
            <a data-toggle="collapse" href="#users">
                <i class="fa fa-users" aria-hidden="true"></i>

                <p>Usuários (Admin)
                    <b class="caret"></b>
                </p>
            </a>
            <div class="collapse {{ Request::is('painel/user*') ? 'in': null }}" id="users">
                <ul class="nav">

                    @if(Request::is('painel/user/trashed*'))
                    <li><a href="{{ route('control.users.admin.read') }}" id="control-user-read">Ativos</a></li>
                    @else
                    <li class="{{ Request::is('painel/user*') ? 'active': null }}"><a href="{{ route('control.users.admin.read') }}" id="control-user-read">Ativos</a></li>
                    @endif
                    <li class="{{ Request::is('painel/user/trashed*') ? 'active': null }}"><a href="{{ route('control.users.admin.read.trashed') }}" id="control-user-read-trashed">Inativos</a></li>
                </ul>
            </div>
        </li>

        <li class="{{ Request::is('painel/authorization/*') ? 'active': null }}">
            <a data-toggle="collapse" href="#permissions">
                <i class="fa fa-superpowers"></i>
                <p>Autorizações
                    <b class="caret"></b>
                </p>
            </a>
            <div class="collapse {{ Request::is('painel/authorization/*') ? 'in': null }}" id="permissions">
                <ul class="nav">
                    <li class="{{ Request::is('painel/authorization/role*') ? 'active': null }}"><a href="{{ route('control.authorization.role.read') }}" id="control-authorization-role-read">Funções</a></li>
                    <li class="{{ Request::is('painel/authorization/permission*') ? 'active': null }}"><a href="{{ route('control.authorization.permission.read') }}" id="control-authorization-permission-read">Permissões</a></li>
                </ul>
            </div>
        </li>

        <li>
            <a data-toggle="collapse" href="#logs">
                <i class="fa fa-paw"></i>
                <p>Logs
                    <b class="caret"></b>
                </p>
            </a>
            <div class="collapse" id="logs">
                <ul class="nav">
                    <li><a href="{{ url('/log/atividade') }}">Logs de Atividades</a></li>
                    <li><a href="{{ url('/log/sistema') }}">Logs do sistema</a></li>
                    <li><a href="{{ url('/log/sistema') }}">Logs de Boots</a></li>
                </ul>
            </div>
        </li>
        @endcan
    </ul>
</div>
