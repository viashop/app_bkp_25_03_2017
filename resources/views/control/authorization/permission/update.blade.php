@extends('control.app')

@section('main-content')
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="header"><strong>Autorizações - Permissão</strong> - Editando permission:
                    <strong>{{ $permission->description }}</strong></div>
                <div class="content">
                    {!! Form::open(['route' => 'control.authorization.permission.update.post', 'role' => 'form']) !!}

                    {{ Form::hidden('permission_id', $permission->id) }}

                    <div class="form-group">
                        <label>SLUG (NOME)</label>
                        {{ Form::text('name', $permission->name, $attributes = ['class' => 'form-control', 'placeholder' => 'Informe a Slug', 'required' => 'autofocus'] ) }}
                    </div>

                    <div class="form-group">
                        <label>Descrição</label>
                        {{ Form::text('description', $permission->description, $attributes = ['class' => 'form-control', 'placeholder' => 'Informe a Descrição', 'required' => 'autofocus'] ) }}

                    </div>

                    {{ Form::submit('Alterar dados', ['class' => 'btn btn-fill btn-primary']) }}
                    &nbsp;
                    &nbsp;
                    {{ link_to_route('control.authorization.permission.read', $title = 'Cancelar', $parameters = [], $attributes = ['title' => 'Cancelar']) }}

                    {!! Form::close() !!}

                </div>
            </div> <!-- end card -->

        </div> <!--  end col-md-12  -->
    </div> <!-- end row -->
@endsection
