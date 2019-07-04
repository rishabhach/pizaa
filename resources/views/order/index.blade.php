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
            <th>User Id</th>

            <th>Post id</th>

            <th>count</th>

            <th>topping</th>
            <th>status</th>
            <th>total</th>
        </tr>
        @foreach($orders as $order)
            <tr>
                <td>{{$order->user_id}}</td>
                <td>{{$order->post_id}}</td>
                <td>{{$order->count}}</td>
                <td>{{$order->topping}}</td>

                <td>@switch ($order->status)
                @case (1)
                        <span>order placed</span>
                    @break
                @case (2)
                        <span>order picked</span>
                    @break
                @case (3)
                        <span>order delivered</span>
                @endswitch
                </td>
                <td>{{$order->total}}</td>

                <td>
                    <form action="{{ route('order.destroy',$order->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('order.show',$order->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('order.edit',$order->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>

        @endforeach

    </table>
@stop