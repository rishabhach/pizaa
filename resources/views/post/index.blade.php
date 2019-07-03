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

            <th>cost</th>

            <th>photo_id</th>

            <th>veg</th>

            <th>Is available</th>

            <th>description</th>

            <th>teg</th>
        </tr>
        @foreach($posts as $post)
            <tr>
                <td><a href="{{route('post.edit',$post->id)}}">{{$post->name}}</a></td>
                <td>{{$post->cost}}</td>
                <td>{{$post->photo_id}}</td>
                <td>{{$post->veg==1?'veg':'no-veg'}}</td>
                <td>{{$post->is_available==1?'available':'out of stock'}}</td>
                <td>{{$post->description}}</td>
                <td>{{$post->tag}}</td>

                <td>
                    <form action="{{ route('post.destroy',$post->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('post.show',$post->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('post.edit',$post->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>

        @endforeach

    </table>
@stop