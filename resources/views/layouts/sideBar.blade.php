@extends('layouts.app')

@section('sideBar')
<!--    --><?php //echo exec('whoami'); ?>

    @if(Auth::user()&&Auth::user()->role->id==1)
    <pre><a href="{{route('user.index')}}">All Users</a>   <a href="{{route('user.create')}}">Create User</a>    <a href="{{route('post.index')}}">All posts</a>   <a href="{{route('post.create')}}">Create post</a>   <a href="{{route('order.index')}}">All Order</a>  <a href="{{route('order.create')}}">create Order</a></pre>
    @endif
@endsection


