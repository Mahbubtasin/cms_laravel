@extends('layouts.admin');

@section('content')
    <div class="card">
        {!! Form::open(['method' => 'post', 'action' => 'AdminCategoryController@store']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Category', ['class' => 'control-label']) !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Create Category', ['class' => 'btn btn-primary']) !!}
                </div>
        {!! Form::close() !!}
    </div>
    <div>
        @if ($categories)
        <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Created_at</th>
                    <th scope="col">Updated_at</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                <tr>
                    <th scope="row">{{$category->id}}</th>
                    <td><a href="{{route('category.edit', $category->id)}}">{{$category->name}}</a></td>
                    <td>{{$category->created_at->diffForHumans()}}</td>
                    <td>{{$category->updated_at->diffForHumans()}}</td>
                    <td>
                        {!! Form::open(['method' => 'delete', 'action' => ['AdminCategoryController@destroy', $category->id]]) !!}
                        <div class="form-group">
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
                </tbody>
        </table>
            @endif
    </div>
@endsection
