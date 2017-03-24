@extends('account.app')

@section('main-content')
<div class="wrapper wrapper-full-page">

    <div class="full-page login-page" filter-color="black" data-image="/fw/material-pro/assets/img/login.jpg">
        <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">

                        <div class="card card-login card-hidden">
                            <div class="card-header text-center" data-background-color="rose">
                                <h4 class="card-title">Esqueceu sua senha?</h4>
                                <p class=" text-center">
                                    Para iniciar a recuperação da sua senha, preencha o endereço de email cadastrado e aguarde as instruções que serão enviadas por email.
                                </p>
                            </div>

                            {!! Form::open(['route' => 'account.recover.post', 'class' => 'form-signin']) !!}

                            <div class="card-content">

                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">email</i>
                                    </span>
                                    <div class="form-group label-floating">
                                        <label class="control-label">Informe seu email</label>
                                        {{ Form::email('email', old('email'), $attributes = ['class' => 'form-control', 'required' => 'autofocus'] ) }}
                                        {{ Session::forget('email_login') }}
                                    </div>
                                </div>

                            </div>
                            <div class="footer text-center">
                                {{ Form::submit('Recuperar senha', ['class' => 'btn btn-rose btn-round', 'id' => 'recover-password']) }}

                            </div>

                            <div class="recover-come-back-login">
                                <a rel="nofollow" href="{{ route('account.login') }}" title="Voltar" class="pull-right text-muted">Voltar</a><span class="clearfix"></span>
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
