@extends('layouts.sideBar')

@section('content')


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
                <td>{{$user->name}}</td>
                <td>{{$user->role_id==1?'administrator':'customer'}}</td>
                <td>{{$user->is_active==1?'active':'in active'}}</td>
            </tr>
        @endforeach

    </table>
@stop