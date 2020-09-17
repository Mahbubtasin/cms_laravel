@extends('layouts.admin');

@section('content')
    {!! Form::model($categories, ['method' => 'patch', 'action' => ['AdminCategoryController@update', $categories->id]]) !!}
    <div class="form-group">
        {!! Form::label('name', 'Category', ['class' => 'control-label']) !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Update Category', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

    {!! Form::open(['method' => 'delete', 'action' => ['AdminCategoryController@destroy', $categories->id]]) !!}
            <div class="form-group">
                {!! Form::submit('Delete Category', ['class' => 'btn btn-danger']) !!}
            </div>
    {!! Form::close() !!}
@endsection
