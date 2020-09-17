@extends('layouts.admin')

@section('content')

    @if (\Illuminate\Support\Facades\Session::has('deleted_photo'))
        <p class="alert alert-danger">{{session('deleted_photo')}}</p>
    @endif
    @if (\Illuminate\Support\Facades\Session::has('add_photo'))
        <p class="alert alert-success">{{session('add_photo')}}</p>
    @endif

    <h1>Media</h1>

    @if ($photos)
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Created_at</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($photos as $photo)
            <tr>
                <th scope="row">{{$photo->id}}</th>
                <td><img height="50px" src="{{$photo->file}}"></td>
                <td>{{$photo->created_at ? $photo->created_at : 'No date'}}</td>
                <td>
                    {!! Form::open(['method' => 'delete', 'action' => ['AdminMediaController@destroy', $photo->id]]) !!}
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
@endsection
