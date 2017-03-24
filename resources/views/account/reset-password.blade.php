@extends('account.app')

@section('main-content')
<div class="wrapper wrapper-full-page">

    <div class="full-page login-page" filter-color="black" data-image="/fw/material-pro/assets/img/login.jpg">
        <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
        <div class="content">
            <div class="container" id="pwd-container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">

                        <div class="card card-login card-hidden">
                            <div class="card-header text-center" data-background-color="rose">
                                <h4 class="card-title">Redefinição de senha</h4>

                                <p class="text-center">
                                    Por favor preencha a sua nova senha abaixo.
                                </p>
                            </div>

                            {!! Form::open(['route' => ['account.reset.password.post', $token], 'class' => 'form-signin']) !!}

                            <div class="card-content">

                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">lock_outline</i>
                                    </span>
                                    <div class="form-group label-floating">
                                        <label class="control-label">Informe sua nova senha</label>
                                        {{ Form::password('password', ['class' => 'form-control', 'pattern'=> '.{6,255}', 'required title' => '6 caracteres no mínimo.', 'id' => 'password'] ) }}
                                    </div>
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">repeat</i>
                                    </span>
                                    <div class="form-group label-floating">
                                        <label class="control-label">Confirme a nova senha</label>
                                        {{ Form::password('password_confirmation', ['class' => 'form-control input-new-password-down',  'pattern'=> '.{6,255}', 'required title' => 'Deve conter entre 6 a 15 caracteres.']) }}
                                    </div>
                                </div>

                                <div class="input-group" id="pwstrength_viewport_progress" style="display:none;">
                                    <span class="input-group-addon">
                                        <i class="material-icons">warning</i>
                                    </span>
                                    <div class="form-group label-floating">

                                    <label class="control-label">Força das senhas</label>
                                    <div class="pwstrength_viewport_progress"></div>

                                    </div>
                                </div>

                            </div>
                            <div class="footer text-center">
                                {{ Form::submit('Confirme sua senha', ['class' => 'btn btn-rose btn-round']) }}
                            </div>

                            {!! Form::close() !!}

                        </div>


                    </div>
                </div>
            </div>
        </div>
        @include('account.partials.footer')
    </div>
</div>
@endsection
