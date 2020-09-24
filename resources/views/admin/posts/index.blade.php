@extends('layouts.admin')

@section('content')

    @if (\Illuminate\Support\Facades\Session::has('deleted_post'))
        <p class="alert alert-danger">{{session('deleted_post')}}</p>
    @endif
    @if (\Illuminate\Support\Facades\Session::has('updated_post'))
        <p class="alert alert-success">{{session('updated_post')}}</p>
    @endif
    @if (\Illuminate\Support\Facades\Session::has('add_post'))
        <p class="alert alert-success">{{session('add_post')}}</p>
    @endif

    <h1>All Post</h1>

    <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Photo</th>
                <th scope="col">User</th>
                <th scope="col">Category</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">View</th>
                <th scope="col">Comment</th>
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
                <td><a href="{{route('home.post', $post->slug)}}" class="btn btn-info">View Post</a></td>
                <td><a href="{{route('comments.show', $post->id)}}" class="btn btn-success">View Comment</a></td>
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

    <div class="row">
        <div class="col-sm-offset-5">
            {{$posts->render()}}
        </div>
    </div>
@stop

