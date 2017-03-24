@extends('control.app')

@section('form-search')
    {!! Form::open(['url' => route('control.users.shops.admin.read'), 'method' => 'get', 'class' => 'navbar-form navbar-left navbar-search-form', 'role' => 'search'] ) !!}
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-search"></i></span>
        <input type="text" name="search" value="{{ Request('search') }}" class="form-control"
               placeholder="Busca por usuários">
    </div>
    {!! Form::close() !!}
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    @if(isset($type) and $type=='shop_admin')
                        <div class="col-xs-6">
                            <h4 class="title"><strong>Shop</strong> - Administradores
                                @if (Request::get('search'))
                                    <a href="{{ route('control.users.shops.admin.read') }}"
                                       class="btn btn-default margin"><i class="fa fa-times-circle"
                                                                         aria-hidden="true"></i> Cancelar busca</a>
                                @endif
                            </h4>
                            <p class="category"><i>Total de administradores cadastrados: <b> {{ $users->total() }}</b>
                                </i></p>
                        </div>
                    @else
                        <div class="col-xs-6">
                            <h4 class="title"><strong>Shop</strong> - Editores
                                @if (Request::get('search'))
                                    <a href="{{ route('control.users.shops.editor.read') }}"
                                       class="btn btn-default margin"><i class="fa fa-times-circle"
                                                                         aria-hidden="true"></i> Cancelar busca</a>
                                @endif
                            </h4>
                            <p class="category"><i>Total de editores cadastrados: <b> {{ $users->total() }}</b> </i></p>
                        </div>
                    @endif
                </div>

                <div class="content table-responsive table-full-width">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Nome</th>
                            <th>Cadastrado por</th>
                            <th class="text-left">Função</th>
                            <th class="text-left">Cadastro em</th>
                            <th class="text-right">Ação</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($users as $user)
                            <tr>

                                <td class="text-center">{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>

                                @if($user->registered_via_oauth == '1')

                                    <td>
                                        @foreach ($user->oauths as $oauth)
                                            <button class="btn btn-social  btn-fill btn-{{ $oauth->oauth_name }}">
                                                <i class="fa fa-{{ $oauth->oauth_slug_icon }}"></i>
                                            </button>
                                        @endforeach

                                    </td>

                                @else

                                    <td>{{ $user->email }}</td>

                                @endif

                                <td class="text-left">
                                    @foreach($user->roles as $role)
                                        <span class="label label-success"><a
                                                    href="{{ route('control.authorization.role.read.permission', $role->id) }}"
                                                    id="view-permission-role-{{ $role->id }}-user-{{ $user->id }}"
                                                    style="color: #ffffff" rel="tooltip"
                                                    title="Visualizar Permissões">{{ $role->description }}</a></span>
                                        &nbsp;
                                    @endforeach
                                </td>


                                <td>{{ tools_format_do_date( $user->created_at ) }}</td>

                                <td class="td-actions text-right">


                                    @if(isset($type) and $type=='shop_admin')
                                        <a href="{{ route('control.users.shops.admin.update', $user->id) }}"
                                           rel="tooltip" id="edit-{{ $user->id }}" title="Editar"
                                           class="btn btn-primary btn-simple btn-xs">
                                            <i class="fa fa-pencil-square fa-2x"></i>
                                        </a>

                                        @if(!empty($user->email))

                                            <a href="javascript://"
                                               onclick="custom.showSwalUser('password-message-confirmation', '{{ route('control.users.shops.admin.new.password', $user->id) }}', '{{ $user->email }}')"
                                               rel="tooltip" title="Gerar nova senha"
                                               class="btn btn-warning btn-simple btn-xs">
                                                <i class="fa fa-envelope-square fa-2x"></i>
                                            </a>

                                        @endif
                                    @else

                                        <a href="{{ route('control.users.shops.editor.update', $user->id) }}"
                                           rel="tooltip" id="edit-{{ $user->id }}" title="Editar"
                                           class="btn btn-primary btn-simple btn-xs">
                                            <i class="fa fa-pencil-square fa-2x"></i>
                                        </a>

                                        @if(!empty($user->email))

                                            <a href="javascript://"
                                               onclick="custom.showSwalUser('password-message-confirmation', '{{ route('control.users.shops.admin.new.password', $user->id) }}', '{{ $user->email }}')"
                                               rel="tooltip" title="Gerar nova senha"
                                               class="btn btn-warning btn-simple btn-xs">
                                                <i class="fa fa-envelope-square fa-2x"></i>
                                            </a>

                                        @endif

                                    @endif

                                </td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            {!! $users->appends(['search' => $search])->render() !!}
        </div>
    </div>
@endsection
