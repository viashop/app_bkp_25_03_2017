@extends('control.app')

@section('form-search')
    {!! Form::open(['url' => route('control.authorization.permission.read'), 'method' => 'get', 'class' => 'navbar-form navbar-left navbar-search-form', 'role' => 'search'] ) !!}
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-search"></i></span>
        <input type="text" name="search" value="{{ Request('search') }}" class="form-control"
               placeholder="Busca por Permissões">
    </div>
    {!! Form::close() !!}
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">

                    <div class="col-xs-6">
                        <h4 class="title"><strong>Autorizações</strong> - Permissões (Permission)
                            @if (Request::get('search'))
                                <a href="{{ route('control.authorization.permission.read') }}"
                                   class="btn btn-default margin"><i class="fa fa-times-circle" aria-hidden="true"></i>
                                    Cancelar busca</a>
                            @endif
                        </h4>
                        <p class="category"><i>Total de permissões cadastradas: <b> {{ $permissions->total() }}</b> </i>
                        </p>
                    </div>

                    <div class="col-xs-6 text-right">
                        @can('read_administrator')
                        <a href="{{ route('control.authorization.permission.create') }}"
                           class="btn btn-default btn-fill btn-wd" id="new-permission">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            Nova Permissão
                        </a>
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

                        @foreach($permissions as $permission)
                            <tr>

                                <td class="text-center">{{ $permission->id }}</td>
                                <td class="text-left"><span class="label label-default ">{{ $permission->name }}</span>
                                </td>
                                <td class="text-left">{{ $permission->description }}</td>

                                <td>{{ tools_format_do_date( $permission->created_at ) }}</td>

                                @can('read_administrator')

                                <td class="td-actions text-right">

                                    <a href="{{ route('control.authorization.permission.update', $permission->id) }}"
                                       rel="tooltip" id="edit-{{ $permission->id }}" title="Editar"
                                       class="btn btn-primary btn-simple btn-xs">
                                        <i class="fa fa-pencil-square fa-2x"></i>
                                    </a>

                                    <a href="{{ route('control.authorization.permission.delete', $permission->id) }}"
                                       rel="tooltip" title="Remover" class="btn btn-danger btn-simple btn-xs"
                                       title="Remover da Administração" id="remove-{{ $permission->id }}"
                                       onclick="return confirm('Deseja realmente excluir {{ $permission->description }}?')">
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
            {!! $permissions->appends(['search' => $search])->render() !!}
        </div>
    </div>
@endsection
