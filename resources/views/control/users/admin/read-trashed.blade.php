@extends('control.app')

@section('form-search')
    {!! Form::open(['url' => route('control.users.admin.read.trashed'), 'method' => 'get', 'class' => 'navbar-form navbar-left navbar-search-form', 'role' => 'search'] ) !!}
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-search"></i></span>
        <input type="text" name="search" value="{{ Request('search') }}" class="form-control"
               placeholder="Busca usuários inativos">
    </div>
    {!! Form::close() !!}
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">

                    <div class="col-xs-12">
                        <h4 class="title"><strong>Admin</strong> - Usuários Adminstrativos (Inativos)
                            @if (Request::get('search'))
                                <a href="{{ route('control.users.admin.read') }}" class="btn btn-default margin"><i
                                            class="fa fa-times-circle" aria-hidden="true"></i> Cancelar busca</a>
                            @endif
                        </h4>
                        <p class="category"><i>Total de usuários inativos: <b> {{ $users->total() }}</b> </i></p>
                    </div>

                </div>

                <div class="content table-responsive table-full-width">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th class="text-left">Função</th>
                            <th class="text-right">Ação</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($users as $user)
                            <tr>

                                <td class="text-center">{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>

                                <td class="text-left">
                                    @foreach($user->roles as $role)
                                        <span class="label label-success">
                                            <a href="{{ route('control.authorization.role.read.permission', $role->id) }}"
                                                    id="view-permission-role-{{ $role->id }}-user-{{ $user->id }}"
                                                    style="color: #ffffff" rel="tooltip"
                                                    title="Visualizar Permissões">{{ $role->description }}
                                            </a>
                                        </span>
                                        &nbsp;
                                    @endforeach
                                </td>

                                <td class="td-actions text-right">

                                    <a href="javascript://"
                                       onclick="custom.showSwalUser('restore-trashed-message-confirmation', '{{ route('control.users.admin.restore.trashed', $user->id) }}', '{{ $user->email }}')"
                                       rel="tooltip" title="Restaurar Acesso" class="btn btn-info btn-simple btn-xs">
                                        <i class="fa fa-recycle fa-2x"></i>
                                    </a>

                                    <a href="{{ route('control.users.admin.update.trashed', $user->id) }}" rel="tooltip"
                                       id="edit-user-{{ $user->id }}" title="Editar"
                                       class="btn btn-primary btn-simple btn-xs">
                                        <i class="fa fa-pencil-square fa-2x"></i>
                                    </a>

                                    <a href="javascript://"
                                       onclick="custom.showSwalUser('delete-trashed-message-confirmation', '{{ route('control.users.admin.delete.trashed', $user->id) }}', '{{ $user->email }}')"
                                       rel="tooltip" title="Remover permanentemente"
                                       class="btn btn-danger btn-simple btn-xs" title="Remover da Administração">
                                        <i class="fa fa-times fa-2x"></i>
                                    </a>

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
