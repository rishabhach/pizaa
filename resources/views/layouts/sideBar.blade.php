@extends('layouts.app')

@section('sideBar')
    <pre><a href="{{route('user.index')}}">All Users</a>    <a href="{{route('user.create')}}">Create User</a>      <a href="{{route('post.index')}}">All posts</a>     <a href="{{route('post.create')}}">Create post</a></pre>
@endsection


