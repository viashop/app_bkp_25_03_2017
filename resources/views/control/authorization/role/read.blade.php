@extends('control.app')

@section('form-search')
    {!! Form::open(['url' => route('control.authorization.role.read'), 'method' => 'get', 'class' => 'navbar-form navbar-left navbar-search-form', 'role' => 'search'] ) !!}
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-search"></i></span>
        <input type="text" name="search" value="{{ Request('search') }}" class="form-control"
               placeholder="Busca por Funções">
    </div>
    {!! Form::close() !!}
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">

                    <div class="col-xs-6">
                        <h4 class="title"><strong>Autorizações</strong> - Funções (Roles)
                            @if (Request::get('search'))
                                <a href="{{ route('control.authorization.role.read') }}" class="btn btn-default margin"><i
                                            class="fa fa-times-circle" aria-hidden="true"></i> Cancelar busca</a>
                            @endif
                        </h4>
                        <p class="category"><i>Total de funções cadastradas: <b> {{ $roles->total() }}</b> </i></p>
                    </div>

                    <div class="col-xs-6 text-right">
                        @can('read_administrator')
                        <a href="{{ route('control.authorization.role.create') }}" class="btn btn-info btn-fill btn-wd"
                           id="new-role"><i class="fa fa-plus" aria-hidden="true"></i> Nova Função</a>
                        @endcan
                    </div>
                </div>

                <div class="content table-responsive table-full-width">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>SLUG (NOME)</th>
                            <th class="text-left">Descrição</th>
                            <th class="text-left">Cadastro em</th>
                            @can('read_administrator')
                            <th class="text-right">Ação</th>
                            @endcan
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($roles as $role)
                            <tr>

                                <td class="text-center">{{ $role->id }}</td>
                                <td class="text-left"><span class="label label-info">{{ $role->name }}</span></td>
                                <td class="text-left">{{ $role->description }}</td>

                                <td>{{ tools_format_do_date( $role->created_at ) }}</td>

                                @can('read_administrator')
                                <td class="td-actions text-right">

                                    <a href="{{ route('control.authorization.role.read.permission', $role->id) }}"
                                       rel="tooltip" id="view-permission-role-{{ $role->id }}"
                                       title="Visualizar permissões" class="btn btn-default btn-simple btn-xs">
                                        <i class="fa fa-unlock fa-2x"></i>
                                    </a>

                                    <a href="{{ route('control.authorization.role.update', $role->id) }}" rel="tooltip"
                                       id="edit-{{ $role->id }}" title="Editar"
                                       class="btn btn-primary btn-simple btn-xs">
                                        <i class="fa fa-pencil-square fa-2x"></i>
                                    </a>

                                    <a href="{{ route('control.authorization.role.delete', $role->id) }}" rel="tooltip"
                                       title="Remover" class="btn btn-danger btn-simple btn-xs" title="Remover"
                                       id="remove-{{ $role->id }}"
                                       onclick="return confirm('Deseja realmente excluir {{ $role->description }}?')">
                                        <i class="fa fa-trash fa-2x"></i>
                                    </a>

                                </td>
                                 @endcan
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
            {!! $roles->appends(['search' => $search])->render() !!}
        </div>
    </div>
@endsection
