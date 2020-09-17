@extends('layouts.admin')

@section('content')
    <h1>Edit User</h1>

    <div class="row">
    <div class="col-sm-3">
        <img src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">
    </div>

    <div class="col-sm-9">
        {!! Form::model($user, ['method' => 'patch', 'action' => ['AdminUsersController@update', $user->id], 'files' => true]) !!}
        {{csrf_field()}}
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
            {!! Form::label('photo_id', 'File:', ['class' => 'control-label']) !!}
            {!! Form::file('photo_id', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('is_active', 'Status:', ['class' => 'control-label']) !!}
            {!! Form::select('is_active', array(1 => 'Active', 0 =>'Not Active'), null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('role_id', 'Role:', ['class' => 'control-label']) !!}
            {!! Form::select('role_id', $role, null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Update User', ['class' => 'btn btn-primary col-sm-6']) !!}
        </div>
        {!! Form::close() !!}

        {!! Form::open(['method' => 'delete', 'action' => ['AdminUsersController@destroy', $user->id]]) !!}
                <div class="form-group">
                    {!! Form::submit('Delete user', ['class' => 'btn btn-danger col-sm-6']) !!}
                </div>
        {!! Form::close() !!}

    </div>
    </div>

    <div class="row">

    @include('includes.error')

    </div>

@endsection
