@extends('layouts.admin')

@section('content')
    <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Photo</th>
                <th scope="col">User</th>
                <th scope="col">Category</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Created_at</th>
                <th scope="col">Updated_at</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @if ($posts)
                @foreach($posts as $post)

            <tr>
                <td>{{$post->id}}</td>
                <td><img height="50px" width="50px" src="{{$post->photo ? $post->photo->file : "http://placehold.it/50x50"}}"></td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->category ? $post->category->name : 'No Category'}}</td>
                <td><a href="{{route('posts.edit', $post->id)}}">{{$post->title}}</a></td>
                <td>{{Str::limit($post->body, 20)}}</td>
                <td>{{$post->created_at->diffForHumans()}}</td>
                <td>{{$post->updated_at->diffForHumans()}}</td>
                <td>
                    {!! Form::open(['method' => 'delete', 'action' => ['AdminPostsController@destroy', $post->id]]) !!}
                    <div class="form-group">
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>

                @endforeach
            @endif
            </tbody>
    </table>
@stop

