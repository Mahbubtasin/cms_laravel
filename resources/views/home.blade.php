@extends('layouts.blog_home')

@section('content')
    @if ($posts)
        @foreach($posts as $post)

    <h2>
        <a href="#">{{$post->title}}</a>
    </h2>
    <p class="lead">
        by <a href="index.php">{{$post->user->name}}</a>
    </p>
    <p><span class="glyphicon glyphicon-time"></span> {{$post->created_at->diffForHumans()}}</p>
    <hr>
    <img class="img-responsive" src="{{$post->photo ? $post->photo->file : "http://placehold.it/900x300"}}" alt="">
    <hr>
    <p>{{Str::limit($post->body, 100)}}</p>
    <a class="btn btn-primary" href="/post/{{$post->slug}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

    <hr>
        @endforeach
    @endif
@endsection
