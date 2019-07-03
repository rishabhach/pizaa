@extends('layouts.sideBar')

@section('content')


    @if($message = Session::get('success'))
        <div class="alert alert-danger">

            <p>{{$message}}</p>

        </div>
    @endif

    <table style="width:100%">
        <tr>
{{--            @foreach($columns as $column)--}}
{{--                <th>{{$column}}</th>--}}
{{--            @endforeach--}}
            <th>name</th>
            <th>role</th>
            <th>Is Active</th>

        </tr>
        @foreach($users as $user)
            <tr>
                <td><a href="{{route('user.edit',$user->id)}}">{{$user->name}}</a></td>
                <td>{{$user->role_id==1?'administrator':'customer'}}</td>
                <td>{{$user->is_active==1?'active':'in active'}}</td>
                <td>
                <form action="{{ route('user.destroy',$user->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('user.show',$user->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('user.edit',$user->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                </td>
            </tr>

        @endforeach

    </table>
@stop