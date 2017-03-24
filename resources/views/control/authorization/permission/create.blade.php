@extends('control.app')

@section('main-content')
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="header"><strong>Autorizações - Permissão</strong> - Cadastrar permission</div>
                <div class="content">
                    {!! Form::open(['route' => 'control.authorization.permission.create.post', 'role' => 'form']) !!}

                    <div class="form-group">
                        <label>SLUG (NOME)</label>
                        {{ Form::text('name', old('name'), $attributes = ['class' => 'form-control', 'placeholder' => 'Informe a Slug', 'required' => 'autofocus'] ) }}
                    </div>

                    <div class="form-group">
                        <label>Descrição</label>
                        {{ Form::text('description', old('description'), $attributes = ['class' => 'form-control', 'placeholder' => 'Informe a Descrição', 'required' => 'autofocus'] ) }}

                    </div>

                    {{ Form::submit('Cadastrar novo', ['class' => 'btn btn-fill btn-primary']) }}
                    &nbsp;
                    &nbsp;
                    {{ link_to_route('control.authorization.permission.read', $title = 'Cancelar', $parameters = [], $attributes = ['title' => 'Cancelar']) }}

                    {!! Form::close() !!}

                </div>
            </div> <!-- end card -->

        </div> <!--  end col-md-12  -->
    </div> <!-- end row -->
@endsection
