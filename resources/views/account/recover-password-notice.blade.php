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
                                <h4 class="card-title">Recuperação da senha solicitada!</h4>

                                <div class="social-line">
                                    <p class=" text-center">
                                        Verifique sua caixa de entrada do email .
Para finalizar a recuperação da senha você deve seguir os passos que estão no email recebido.
                                    </p>

                                </div>
                            </div>

                            <div class="footer text-center">

                                <a href="{{ route('account.login') }}" class="btn btn-info btn-default">Voltar para login</a>

                            </div>

                            <div class="text-center text-notice-password">

                                Se ainda não recebeu a mensagem, não esqueça de verificar na sua caixa de spam, ou <a rel="nofollow" href="{{ route('account.recover') }}">clique aqui</a> para reenviar o email de recuperação.
Se você não conseguir recuperar a sua senha, entre em contato com o suporte técnico.

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('account.partials.footer')
    </div>
</div>
@endsection
