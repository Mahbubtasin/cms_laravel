@extends('layouts.admin')

@section('content')

    @if (count($replies) > 0)
        <h1>Reply</h1>

        <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Author</th>
                    <th scope="col">Email</th>
                    <th scope="col">Body</th>
                    <th scope="col">View</th>
                    <th scope="col">Confirm</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($replies as $reply)
                <tr>
                    <th scope="row">{{$reply->id}}</th>
                    <td>{{$reply->author}}</td>
                    <td>{{$reply->email}}</td>
                    <td>{{Str::limit($reply->body, 20)}}</td>
                    <td><a href="{{route('home.post', $reply->comment->post->slug)}}" class="btn btn-info">View Post</a></td>
                    <td>
                        @if ($reply->is_active == 1)

                            {!! Form::open(['method' => 'patch', 'action' => ['CommentRepliesController@update', $reply->id]]) !!}
                            <input type="hidden" name="is_active" value="0">
                            <div class="form-group">
                                {!! Form::submit('Un-approve', ['class' => 'btn btn-danger']) !!}
                            </div>
                            {!! Form::close() !!}

                        @else

                            {!! Form::open(['method' => 'patch', 'action' => ['CommentRepliesController@update', $reply->id]]) !!}
                            <input type="hidden" name="is_active" value="1">
                            <div class="form-group">
                                {!! Form::submit('Approve', ['class' => 'btn btn-primary']) !!}
                            </div>
                            {!! Form::close() !!}

                        @endif
                    </td>
                    <td>
                        {!! Form::open(['method' => 'delete', 'action' => ['CommentRepliesController@destroy', $reply->id]]) !!}
                        <div class="form-group">
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
                </tbody>
        </table>

        <div class="row">
            <div class="col-sm-offset-5">
                {{$replies->render()}}
            </div>
        </div>

    @else
        <h1 class="text-center">No Reply</h1>
    @endif




@endsection
