@extends('control.app')

@section('main-content')
<div class="row">

    <div class="col-md-12" >
        <div class="card">
            <div class="header">
                <legend>Cadastrar permissões para: <strong>{{ $role->description }}</strong></legend>
                <div class="row" style="padding: 0 0 30px 10px">
                    {!! Form::open(['route' => [ 'control.authorization.permission.authorize.post', $role->id ], 'role' => 'form']) !!}

                    <div class="col-xs-6">
                        {!! Form::select('permission_id', $permissions, null, ['class' => 'selectpicker', 'data-style' => 'btn-default btn-block',  'data-menu-style' => 'dropdown-blue', 'required' => 'required']) !!}
                    </div>

                    <div class="col-xs-3">
                        {{ Form::submit('Cadastrar', ['class' => 'btn btn-fill btn-primary', 'id' => 'add']) }}
                    </div>

                    <div class="col-xs-3 text-right">
                        <a href="{{ route('control.authorization.role.read') }}" class="btn btn-default margin">
                            <i class="fa fa-times-circle"
                            aria-hidden="true"></i>
                            Cancelar</a>
                    </div>

                    {!! Form::close() !!}

                </div>

            </div>

        </div>
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="header">

                <div class="col-xs-12">
                    <h4 class="title">
                        Permissões cadastradas para: <strong>{{ $role->description }}</strong>
                    </h4>
                    <p class="category"><i>Total de permissões cadastradas: <b> {{ $role->permissions()->count() }}</b> </i>
                    </p>
                </div>

            </div>

            <div class="content table-responsive table-full-width">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>SLUG (NOME)</th>
                            <th class="text-left">Descrição</th>
                            <th class="text-left">Status</th>
                            <th class="text-center">Ação</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($role->permissions as $permission)
                        <tr>

                            <td class="text-center">{{ $permission->id }}</td>
                            <td class="text-left"><span class="label label-info">{{ $permission->name }}</span></td>
                            <td class="text-left">{{ $permission->description }}</td>

                            <td class="text-left">
                                <i rel="tooltip" title="Acesso Permitido"
                                class="fa fa-unlock fa-3x btn btn-success btn-simple btn-xs"></i>
                            </td>

                            <td class="td-actions text-center">
                                <a href="{{ route('control.authorization.permission.revoke', [$role->id, $permission->id] ) }}"
                                    id="revoke-{{ $permission->id }}" title="Revogar Permissão"
                                    class="btn btn-success btn-simple btn-xs">
                                    <button class="btn btn-danger btn-fill btn-wd">Revogar</button>
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
@endsection
