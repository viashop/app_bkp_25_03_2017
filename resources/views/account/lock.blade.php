@extends('account.app')

@section('main-content')
<div class="wrapper wrapper-full-page">
    <div class="full-page lock-page" filter-color="black" data-image="/fw/material-pro/assets/img/lock.jpg">
        <!--   you can change the color of the filter page using: data-color="blue | green | orange | red | purple" -->
        <div class="content">
            {!! Form::open(['route' => 'account.register.post', 'class' => 'form-signin']) !!}
                <div class="card card-profile card-hidden">
                    <div class="card-avatar">
                        <a rel="nofollow" href="#">
                            <img class="avatar" src="{{ Gravatar::get('example@vialoja.com') }}" alt="...">
                        </a>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Name Example</h4>
                        <div class="form-group label-floating">
                            <label class="control-label">Informe sua senha</label>
                            {{ Form::password('password', ['class' => 'form-control', 'pattern'=> '.{6,}', 'required title' => '6 caracteres no mínimo.'] ) }}
                        </div>
                    </div>
                    <div class="card-footer">
                        {{ Form::submit('Desbloquear', ['class' => 'btn btn-rose btn-round']) }}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
        @include('account.partials.footer')
    </div>
</div>

@endsection
