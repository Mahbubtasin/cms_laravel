@extends('layouts.admin')

@section('content')

    @if (count($comments) > 0)

        <h1>Comments</h1>

        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Author</th>
                <th scope="col">Email</th>
                <th scope="col">Body</th>
                <th scope="col">View</th>
                <th scope="col">Reply</th>
                <th scope="col">Confirm</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($comments as $comment)
                <tr>
                    <th scope="row">{{$comment->id}}</th>
                    <td>{{$comment->author}}</td>
                    <td>{{$comment->email}}</td>
                    <td>{{Str::limit($comment->body, 20)}}</td>
                    <td><a href="{{route('home.post', $comment->post->id)}}" class="btn btn-info">View Post</a></td>
                    <td><a href="{{route('replies.show', $comment->id)}}" class="btn btn-info">View Reply</a></td>
                    <td>
                        @if ($comment->is_active == 1)

                            {!! Form::open(['method' => 'patch', 'action' => ['PostsCommentController@update', $comment->id]]) !!}
                            <input type="hidden" name="is_active" value="0">
                            <div class="form-group">
                                {!! Form::submit('Un-approve', ['class' => 'btn btn-danger']) !!}
                            </div>
                            {!! Form::close() !!}

                        @else

                            {!! Form::open(['method' => 'patch', 'action' => ['PostsCommentController@update', $comment->id]]) !!}
                            <input type="hidden" name="is_active" value="1">
                            <div class="form-group">
                                {!! Form::submit('Approve', ['class' => 'btn btn-primary']) !!}
                            </div>
                            {!! Form::close() !!}

                        @endif
                    </td>
                    <td>
                        {!! Form::open(['method' => 'delete', 'action' => ['PostsCommentController@destroy', $comment->id]]) !!}
                        <div class="form-group">
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    @else
        <h1 class="text-center">No Comment</h1>

    @endif

@endsection
