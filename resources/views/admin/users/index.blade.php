@extends('layouts.admin')

@section('content')
    @if (\Illuminate\Support\Facades\Session::has('deleted_user'))
        <p class="alert alert-danger">{{session('deleted_user')}}</p>
    @endif
    @if (\Illuminate\Support\Facades\Session::has('updated_user'))
        <p class="alert alert-success">{{session('updated_user')}}</p>
    @endif
    @if (\Illuminate\Support\Facades\Session::has('add_user'))
        <p class="alert alert-success">{{session('add_user')}}</p>
    @endif


    <h1>Users</h1>

    <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Photo</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Status</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>

            @if($users)

                @foreach($users as $user)
            <tr>
                <th>{{$user->id}}</th>
                <th><img height="50px" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/50x50'}}"></th>
                <td><a href="{{route('users.edit', $user->id)}}">{{$user->name}}</a></td>
                <td>{{$user->email}}</td>
                <td>{{$user->role->name}}</td>
                <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
                <td>{{$user->created_at->diffForHumans()}}</td>
                <td>{{$user->updated_at->diffForHumans()}}</td>
                <td>
                    {!! Form::open(['method' => 'delete', 'action' => ['AdminUsersController@destroy', $user->id]]) !!}
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

@endsection
