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
                                <h4 class="card-title">Fazer login para prosseguir</h4>

                                <div class="social-line">
                                    <p class="text-center">
                                        Entrar com um destes serviços
                                    </p>

                                    <a href="{{ route('account.oauth.authenticate.facebook') }}" class="btn btn-just-icon btn-simple">
                                        <i class="fa fa-facebook-square"></i>
                                    </a>
                                    <a href="{{ route('account.oauth.authenticate.twitter') }}" class="btn btn-just-icon btn-simple">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                    <a href="{{ route('account.oauth.authenticate.google') }}" class="btn btn-just-icon btn-simple">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </div>
                            </div>
                            <p class="category text-center">
                                ou pelo modo clássico
                            </p>

                            {!! Form::open(['route' => 'account.authenticate.post', 'class' => 'form-signin']) !!}

                            <div class="card-content">

                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">email</i>
                                    </span>
                                    <div class="form-group label-floating">
                                        <label class="control-label">Informe seu email</label>
                                        {{ Form::email('email', Session::get('email_login'), $attributes = ['class' => 'form-control', 'required' => 'autofocus'] ) }}
                                        {{ Session::forget('email_login') }}
                                    </div>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">lock_outline</i>
                                    </span>
                                    <div class="form-group label-floating">
                                        <label class="control-label">Informe sua senha</label>
                                        {{ Form::password('password', ['class' => 'form-control', 'pattern'=> '.{6,}', 'required title' => '6 caracteres no mínimo.'] ) }}
                                    </div>
                                </div>
                            </div>
                            <div class="footer text-center">
                                {{ Form::submit('Fazer Login', ['class' => 'btn btn-rose btn-round', 'id' => 'login']) }}

                            </div>

                            <div class="account-recover">
                                <a href="{{ route('account.recover') }}" title="Esqueceu sua senha?" class="pull-right text-muted">Esqueceu sua senha?</a><span class="clearfix"></span>
                            </div>

                            {!! Form::close() !!}

                        </div>

                        <div class="text-center account-register">
                            <p>Ainda não tem uma loja no Shopping ViaLoja?</p>
                            <a href="{{ route('account.register') }}" title="Crie Agora, é Grátis!" class="create-user">Crie Agora, é Grátis!</a>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        @include('account.partials.footer')
    </div>
</div>
@endsection
