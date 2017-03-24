@extends('control.app')

@section('main-content')
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="header"><strong>SHOP</strong> - Editando usuário: <strong>{{ $user->name }}</strong></div>
                <div class="content">

                    @if(isset($type) and $type=='admin')

                        {!! Form::open(['route' => ['control.users.shops.admin.update.post', $user->id ], 'role' => 'form']) !!}

                    @else

                        {!! Form::open(['route' => ['control.users.shops.editor.update.post', $user->id ], 'role' => 'form']) !!}

                    @endif

                    <div class="form-group">
                        <label>Nome completo</label>
                        {{ Form::text('name', $user->name, $attributes = ['class' => 'form-control', 'placeholder' => 'Informe o nome', 'required' => 'autofocus'] ) }}

                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        {{ Form::email('email', $user->email, $attributes = ['class' => 'form-control', 'placeholder' => 'Informe o email', 'required' => 'autofocus'] ) }}
                    </div>

                    <div class="form-group">
                        <legend>Funções</legend>
                        @foreach ($roles as $role)
                            <div class="col-md-12" style="margin:10px 0 25px 0">
                                <p class="category">{{  $role->description }}</p>

                                @if(in_array($role->id, $roles_allowed))
                                    {{ Form::checkbox('role_id[]', $role->id, true, ['data-toggle' => 'switch', 'disabled' => 'disabled'] ) }}
                                @else
                                    {{ Form::checkbox('role_id[]', $role->id, false, ['data-toggle' => 'switch', 'disabled' => 'disabled']) }}
                                @endif

                            </div>
                        @endforeach
                    </div>

                    {{ Form::submit('Alterar dados', ['class' => 'btn btn-fill btn-primary']) }}
                    &nbsp;
                    &nbsp;
                    {{ link_to_route('control.users.shops.admin.read', $title = 'Cancelar', $parameters = [], $attributes = ['title' => 'Cancelar']) }}

                    {!! Form::close() !!}

                </div>
            </div> <!-- end card -->

        </div> <!--  end col-md-12  -->
    </div> <!-- end row -->
@endsection
