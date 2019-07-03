@extends('layouts.sideBar')

@section('content')

@section('content')

    <form method="POST" action="{{route('user.update',$user->id)}}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
        </div>

        <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" id="email" name="email"value="{{$user->email}}">
        </div>

        <div class="form-group">
            <label for="role">role:</label>
            <input type="text" class="form-control" id="role" name="role_id" value="{{$user->role_id}}">
        </div>

        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" name="password" value="{{$user->password}}">
        </div>

        <div class="form-group">
            <label for="is_active">is active:</label>
            <input type="text" class="form-control" id="Is_active" name="is_active" value="{{$user->is_active}}">
        </div>

        <button type="submit" class="btn btn-primary">create User</button>

    </form>

    @if(count($errors)>0)

        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)

                    <li>{{$error}}</li>
                @endforeach
            </ul>


        </div>


    @endif





@endsection






@endsection