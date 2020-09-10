@extends('layouts.admin')

@section('content')
<h1>Create Users</h1>

    {!! Form::open(['method' => 'post', 'action' => 'AdminUsersController@store']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
            {!! Form::email('email', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password', 'Password:', ['class' => 'control-label']) !!}
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
            {!! Form::select('status', array(1 => 'Active', 0 =>'Not Active'), 0, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('role_id', 'Role:', ['class' => 'control-label']) !!}
            {!! Form::select('role_id', array('' => 'Choose Options') + $roles, null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Create User', ['class' => 'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}

    @include('includes.error')


@endsection
