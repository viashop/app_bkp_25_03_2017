@extends('control.app')

@section('main-content')
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="header"><strong>Dados pessoais</strong></div>
                <div class="content" id="pwd-container">
                    {!! Form::open(['route' => 'control.users.personal.read.post', 'role' => 'form']) !!}

                    <div class="form-group">
                        <legend>Nome e E-mail</legend>
                        <label>Nome completo</label>
                        {{ Form::text('name', $user->name, $attributes = ['class' => 'form-control', 'placeholder' => 'Informe o nome', 'required' => 'autofocus'] ) }}
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        {{ Form::email('email', $user->email, $attributes = ['class' => 'form-control', 'placeholder' => 'Informe o email', 'disabled' => 'disabled'] ) }}
                    </div>

                    <div class="form-group">
                        <legend>Funções</legend>
                        @foreach ($roles as $role)
                            <div class="col-md-3" style="margin:10px 0 25px 0">
                                <p class="category">{{  $role->description }}</p>

                                @if(in_array($role->id, $roles_allowed))
                                    {{ Form::checkbox('role_id[]', $role->id, true, ['data-toggle' => 'switch', 'disabled' => 'disabled']) }}
                                @else
                                    {{ Form::checkbox('role_id[]', $role->id, false, ['data-toggle' => 'switch', 'disabled' => 'disabled']) }}
                                @endif

                            </div>
                        @endforeach
                    </div>

                    <div class="form-group">
                        <legend>Alterar Senha</legend>
                        <label>Senha Atual</label>
                        {{ Form::password('password_current', ['class' => 'form-control', 'pattern'=> '.{6,}', 'title' => '6 caracteres no mínimo.'] ) }}
                    </div>

                    <div class="form-group">
                        <label>Nova Senha</label>
                        {{ Form::password('password', ['class' => 'form-control', 'pattern'=> '.{6,255}', 'title' => '6 caracteres no mínimo.', 'id' => 'password'] ) }}
                    </div>

                    <div class="form-group">
                        <label>Confirmar Nova Senha</label>
                        {{ Form::password('password_confirmation', ['class' => 'form-control', 'pattern'=> '.{6,255}', 'title' => '6 caracteres no mínimo.'] ) }}
                    </div>

                    <div class="form-group">
                        <label>Forças das senhas</label>
                        <div class="pwstrength_viewport_progress"></div>
                    </div>


                    {{ Form::submit('Alterar dados', ['class' => 'btn btn-fill btn-primary']) }}
                    &nbsp;
                    &nbsp;
                    {{ link_to(url('/painel'), $title = 'Cancelar', $attributes = ['class' => 'btn btn-default'], $secure = null) }}

                    {!! Form::close() !!}

                </div>
            </div> <!-- end card -->

        </div> <!--  end col-md-12  -->
    </div> <!-- end row -->
@endsection
