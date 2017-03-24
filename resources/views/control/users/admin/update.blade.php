@extends('control.app')

@section('main-content')
    <div class="row">
        <div class="col-md-12">

            <div class="card">

                <div class="header">

                    <div class="col-md-12 text-left">
                        <div style="margin: 0 0 30px -15px">
                            <strong>Admin</strong> - Editando usuário: <strong>{{ $user->name }}</strong>
                        </div>

                    </div>

                </div>

                <div class="content text-left">
                    {!! Form::open(['route' => ['control.users.admin.update.post', $user->id], 'role' => 'form']) !!}

                    <div class="form-group">
                        <legend>
                            <div class="text-left">
                                Editar Dados
                            </div>
                        </legend>
                        <label>Nome completo</label>
                        {{ Form::text('name', $user->name, $attributes = ['class' => 'form-control', 'placeholder' => 'Informe o nome', 'required' => 'autofocus'] ) }}

                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        {{ Form::email('email', $user->email, $attributes = ['class' => 'form-control', 'placeholder' => 'Informe o email', 'required' => 'autofocus'] ) }}
                    </div>
                    <div class="form-group">
                        <legend>Funções</legend>
                        @foreach ($roles as $role)
                            <div class="col-md-3" style="margin:10px 0 25px 0">
                                <p class="category">{{  $role->description }}</p>

                                @if(in_array($role->id, $roles_allowed))
                                    {{ Form::checkbox('role_id[]', $role->id, true, ['data-toggle' => 'switch']) }}
                                @else
                                    {{ Form::checkbox('role_id[]', $role->id, false, ['data-toggle' => 'switch']) }}
                                @endif

                            </div>
                        @endforeach
                    </div>
                    {{ Form::submit('Alterar dados', ['class' => 'btn btn-fill btn-primary']) }}
                    &nbsp;
                    &nbsp;
                    {{ link_to_route('control.users.admin.read', $title = 'Cancelar', $parameters = [], $attributes = ['title' => 'Cancelar']) }}

                    {!! Form::close() !!}

                </div>
            </div> <!-- end card -->

        </div> <!--  end col-md-12  -->


        <div class="col-md-12 text-right">
            <a href="javascript://"
               onclick="custom.showSwalUser('remove-permissions-message-confirmation', '{{ route('control.authorization.permission.remove', $user->id) }}', '{{ $user->email }}')"
               id="permission-remove-{{ $user->id }}" class="btn btn-danger margin" rel="tooltip"
               title="Altera para usuário padrão"><i class="fa fa-times-circle" aria-hidden="true"></i>
                Remover Funções Administrativas</a>
        </div>
    </div> <!-- end row -->
@endsection
