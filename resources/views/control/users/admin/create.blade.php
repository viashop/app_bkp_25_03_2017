@extends('control.app')

@section('main-content')
<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="header">Cadastrar usuário</strong> </div>
            <div class="content">
                {!! Form::open(['route' => 'control.users.admin.create.post', 'role' => 'form']) !!}

                <div class="form-group">

                    <label>Nome completo</label>
                    {{ Form::text('name', null, $attributes = ['class' => 'form-control', 'placeholder' => 'Informe o nome', 'required' => 'autofocus'] ) }}
                </div>

                <div class="form-group">
                    <label>Email</label>
                    {{ Form::email('email', null, $attributes = ['class' => 'form-control', 'placeholder' => 'Informe o email', 'required' => 'autofocus'] ) }}
                </div>

                <div class="form-group">
                    <legend>Funções</legend>
                    @foreach ($roles as $key => $role)
                    <div class="col-md-3" style="margin:10px 0 25px 0">
                        <p class="category">{{  $role->description }}</p>
                        {{ Form::checkbox('role_id[]', $role->id, false, ['data-toggle' => 'switch', 'id-' => $key]) }}
                    </div>
                    @endforeach
                </div>

                {{ Form::submit('Cadastrar novo', ['class' => 'btn btn-fill btn-primary']) }}
                &nbsp;
                &nbsp;
                {{ link_to_route('control.users.admin.read', $title = 'Cancelar', $parameters = [], $attributes = ['title' => 'Cancelar']) }}

                {!! Form::close() !!}

            </div>
        </div> <!-- end card -->

    </div> <!--  end col-md-12  -->
</div> <!-- end row -->
@endsection
