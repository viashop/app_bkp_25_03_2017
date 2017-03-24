@extends('control.app')

@section('main-content')
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="header"><strong>Autorizações - Funções</strong> - Editando role:
                    <strong>{{ $role->description }}</strong></div>
                <div class="content">
                    {!! Form::open(['route' => 'control.authorization.role.update.post', 'role' => 'form']) !!}

                    {{ Form::hidden('role_id', $role->id) }}

                    <div class="form-group">
                        <label>SLUG (NOME)</label>
                        {{ Form::text('name', $role->name, $attributes = ['class' => 'form-control', 'placeholder' => 'Informe a Slug', 'required' => 'autofocus'] ) }}
                    </div>

                    <div class="form-group">
                        <label>Descrição</label>
                        {{ Form::text('description', $role->description, $attributes = ['class' => 'form-control', 'placeholder' => 'Informe a Descrição', 'required' => 'autofocus'] ) }}
                    </div>

                    {{ Form::submit('Alterar dados', ['class' => 'btn btn-fill btn-primary']) }}
                    &nbsp;
                    &nbsp;
                    {{ link_to_route('control.authorization.role.read', $title = 'Cancelar', $parameters = [], $attributes = ['title' => 'Cancelar']) }}

                    {!! Form::close() !!}

                </div>
            </div> <!-- end card -->

        </div> <!--  end col-md-12  -->
    </div> <!-- end row -->
@endsection
