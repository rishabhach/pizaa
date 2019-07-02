@extends('layouts.app')

@section('sideBar')
    <a href="{{route('user.index')}}">All Users</a>
    <a href="{{route('user.create')}}">Create User</a>

@stop


