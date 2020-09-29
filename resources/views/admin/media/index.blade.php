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

        <form action="/delete/media" method="post" class="form-inline">

            <div class="form-group">
                <select name="checkBoxArray[]" id="" class="form-control">
                    <option value="delete">Delete</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-danger">
            </div>

        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col"><input type="checkbox" id="options"></th>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Created_at</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($photos as $photo)
            <tr>
                <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"></td>
                <td scope="row">{{$photo->id}}</td>
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
        </form>
        <div class="row">
            <div class="col-sm-offset-5">
                {{$photos->render()}}
            </div>
        </div>
    @endif




@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#options').click(function () {
                if (this.checked) {
                    $('.checkBoxes').each(function () {
                        this.checked = true;
                    })
                }
                else {
                    $('.checkBoxes').each(function () {
                        this.checked = false;
                    })
                }
            })
        })
    </script>
@stop
