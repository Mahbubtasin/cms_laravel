@extends('layouts.admin')

@section('content')

    <h1>Post</h1>

    {!! Form::open(['method' => 'post', 'action' => 'AdminPostsController@store', 'files' => true]) !!}
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
                {!! Form::submit('Create Post', ['class' => 'btn btn-primary']) !!}
            </div>
    {!! Form::close() !!}

    @include('includes.error')

@stop

