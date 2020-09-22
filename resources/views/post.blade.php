@extends('layouts.blog_post')

@section('content')

    @if (\Illuminate\Support\Facades\Session::has('comment_message'))
        <p class="alert alert-danger">{{session('comment_message')}}</p>
    @endif
    @if (\Illuminate\Support\Facades\Session::has('reply_message'))
        <p class="alert alert-danger">{{session('reply_message')}}</p>
    @endif

    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo->file}}" alt="">

    <hr>

    <!-- Post Content -->
    <p> {{$post->body}} </p>

    <hr>

    <!-- Blog Comments -->

    @if (\Illuminate\Support\Facades\Auth::check())

    <!-- Comments Form -->
    <div class="well">
        <h4>Leave a Comment:</h4>

        {!! Form::open(['method' => 'post', 'action' => 'PostsCommentController@store']) !!}

        <input type="hidden" name="post_id" value="{{$post->id}}">

                <div class="form-group">
                    {!! Form::label('body', 'Body', ['class' => 'control-label']) !!}
                    {!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => 3]) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                </div>
        {!! Form::close() !!}

    </div>

    @endif

    <hr>

    <!-- Posted Comments -->

    @if (count($comments) > 0)

        @foreach ($comments as $comment)

            <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="{{$comment->photo ? $comment->photo : "http://placehold.it/64x64"}}" alt="" height="64px">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$comment->author}}
                            <small>{{$comment->created_at->diffForHumans()}}</small>
                        </h4>
                        <p>{{$comment->body}}</p>

                            @foreach($comment->reply as $replies)

                                @if ($replies->is_active == 1)

                        <!-- Nested Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="{{$replies->photo ? $replies->photo : "http://placehold.it/64x64"}}" alt="" height="64px">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">{{$replies->author}}
                                    <small>{{$replies->created_at->diffForHumans()}}</small>
                                </h4>
                                <p>{{$replies->body}}</p>
                            </div>
                        </div>

                                @endif

                        <!-- End Nested Comment -->
                                @endforeach
                    </div>
                </div>
            {!! Form::open(['method' => 'post', 'action' => 'CommentRepliesController@reply']) !!}
            <input type="hidden" name="comment_id" value="{{$comment->id}}">
            <div class="form-group">
                {!! Form::label('body', 'Reply', ['class' => 'control-label']) !!}
                {!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => 2]) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}



        @endforeach

    @endif





    <!-- Comment -->
{{--    <div class="media">--}}
{{--        <a class="pull-left" href="#">--}}
{{--            <img class="media-object" src="http://placehold.it/64x64" alt="">--}}
{{--        </a>--}}
{{--        <div class="media-body">--}}
{{--            <h4 class="media-heading">Start Bootstrap--}}
{{--                <small>August 25, 2014 at 9:30 PM</small>--}}
{{--            </h4>--}}
{{--            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.--}}
{{--            <!-- Nested Comment -->--}}
{{--            <div class="media">--}}
{{--                <a class="pull-left" href="#">--}}
{{--                    <img class="media-object" src="http://placehold.it/64x64" alt="">--}}
{{--                </a>--}}
{{--                <div class="media-body">--}}
{{--                    <h4 class="media-heading">Nested Start Bootstrap--}}
{{--                        <small>August 25, 2014 at 9:30 PM</small>--}}
{{--                    </h4>--}}
{{--                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- End Nested Comment -->--}}
{{--        </div>--}}
{{--    </div>--}}

@endsection

@section('category')
    <li>
        <a href="#">{{$post->category->name}}</a>
    </li>
@stop
