@extends('account.app')

@section('main-content')
<div class="wrapper wrapper-full-page">
    <div class="full-page register-page" filter-color="black" data-image="/fw/material-pro/assets/img/register.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="card card-signup">
                        <h2 class="card-title text-center">Criar conta <strong>Loja Virtual</strong></h2>
                        <div class="row">
                            <div class="col-md-5 col-md-offset-1">
                                <div class="card-content">
                                    <div class="info info-horizontal">
                                        <div class="icon icon-rose">
                                            <i class="material-icons">timer</i>
                                        </div>
                                        <div class="description">
                                            <h4 class="info-title">Fácil de criar e administrar</h4>
                                            <p class="description">
                                                Você monta sua Loja Virtual em pouquíssimo tempo e já começa a vender!<br />
                                                Sua loja estará online instantaneamente, sem instalar nenhum programa ou contratar hospedagem.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="info info-horizontal">
                                        <div class="icon icon-primary">
                                            <i class="material-icons">important_devices</i>
                                        </div>
                                        <div class="description">
                                            <h4 class="info-title">Design responsivo</h4>
                                            <p class="description">
                                                Sua loja funcionará em smartphones e tablets.
                                                Ela se adapta pra você vender mais em qualquer dispositivo.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="info info-horizontal">
                                        <div class="icon icon-info">
                                            <i class="material-icons">group</i>
                                        </div>
                                        <div class="description">
                                            <h4 class="info-title">Comunidade de Ajuda</h4>
                                            <p class="description">
                                                A  comunidade Vialoja é um espaço de discussão gratuito e ela é aberta a todos os lojistas para trocas de experiências!
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="social text-center">

                                    <p class="text-center text-primary">
                                        Registre-se com um destes serviços
                                    </p>

                                    <button onClick="location.href='{{ route('account.oauth.register.facebook') }}'" class="btn btn-just-icon btn-round btn-facebook">
                                        <i class="fa fa-facebook"> </i>
                                    </button>

                                    <button onClick="location.href='{{ route('account.oauth.register.twitter') }}'" class="btn btn-just-icon btn-round btn-twitter">
                                        <i class="fa fa-twitter"></i>
                                    </button>

                                    <button onClick="location.href='{{ route('account.oauth.register.google') }}'" class="btn btn-just-icon btn-round btn-dribbble">
                                        <i class="fa fa-google-plus"></i>
                                    </button>

                                    <h4> ou pelo modo clássico </h4>
                                </div>

                                {!! Form::open(['route' => 'account.register.post', 'class' => 'form-signin']) !!}

                                    <div class="card-content" id="pwd-container">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">face</i>
                                            </span>
                                            {{ Form::text('name', old('name') ? old('name') : session('name'), $attributes = ['class' => 'form-control', 'placeholder' => 'Informe seu nome completo', 'pattern'=> '.{2,}', 'required title' => '2 caracteres no mínimo.'] ) }}
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">email</i>
                                            </span>
                                            {{ Form::email('email', old('email') ? old('email') : session('email'), $attributes = ['class' => 'form-control input-register-email', 'placeholder' => 'Informe seu melhor e-mail', 'required' => 'autofocus'] ) }}
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                            {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Informe sua senha', 'pattern'=> '.{6,}', 'required title' => '6 caracteres no mínimo.'] ) }}
                                        </div>

                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">repeat</i>
                                            </span>
                                            {{ Form::password('password_confirmation', ['class' => 'form-control','placeholder' => 'Confirme a senha', 'pattern'=> '.{6,}', 'required title' => '6 caracteres no mínimo.']) }}
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

                                        <!-- If you want to add a checkbox to this form, uncomment this code -->
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="optionsCheckboxes" checked>

                                                    Ao se cadastrar, você concorda com nossos <a href="{{ Config::get('constants-links.HTTP_VIALOJA') }}/termos-de-uso/" title="Termos de uso" target="_blank">Termos</a>
                                                    e que você leu nossa <a href="{{ Config::get('constants-links.HTTP_VIALOJA') }}/politica-de-privacidade/" title="Política de privacidade" target="_blank">Política de Dados</a>,
                                                    incluindo nosso Uso de <a href="{{ Config::get('constants-links.HTTP_VIALOJA') }}/informacoes-sobre-cookies/" title="Informações sobre Cookie" target="_blank">Cookies.</a>

                                            </label>
                                        </div>
                                    </div>
                                    <div class="footer text-center">

                                        {{ Form::submit('Confirmar', ['class' => 'btn btn-primary btn-round', 'id' => 'register']) }}

                                    </div>

                                {!! Form::close() !!}

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
