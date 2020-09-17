@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-sm-3">
            <img src="{{$posts->photo ? $posts->photo->file : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">
        </div>

        <div class="col-sm-9">
    {!! Form::model($posts, ['method' => 'patch', 'action' => ['AdminPostsController@update', $posts->id], 'files' => true]) !!}
    <div class="form-group">
        {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('category_id', 'Category', ['class' => 'control-label']) !!}
        {!! Form::select('category_id', ['' => 'Choose Category'] + $categories , null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('photo_id', 'Photo', ['class' => 'control-label']) !!}
        {!! Form::file('photo_id') !!}
    </div>
    <div class="form-group">
        {!! Form::label('body', 'Description', ['class' => 'control-label']) !!}
        {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Update Post', ['class' => 'btn btn-primary col-sm-6']) !!}
    </div>
    {!! Form::close() !!}

    {!! Form::open(['method' => 'delete', 'action' => ['AdminPostsController@destroy', $posts->id]]) !!}
    <div class="form-group">
        {!! Form::submit('Delete Post', ['class' => 'btn btn-danger col-sm-6']) !!}
    </div>
    {!! Form::close() !!}
        </div>
    </div>

    @include('includes.error')

@stop
