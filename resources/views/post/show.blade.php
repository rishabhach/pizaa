@extends('layouts.sideBar')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Post</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('post.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $post->name }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Cost:</strong>
                {{ $post->cost }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>photo_id:</strong>
                {{ $post->photo_id }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Is_available:</strong>
                {{ $post->is_availbale }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>veg:</strong>
                {{ $post->veg }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>tag:</strong>
                {{ $post->tag }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>description:</strong>
                {{ $post->description }}
            </div>
        </div>
    </div>
    <form method="POST" action="{{route('orderPlace',$post->id)}}">
        @csrf
        <div class="form-group">
            <label for="count">Count</label>
            <input type="number" class="form-control" id="count" name="count">
        </div>

        <div class="form-group">
            <label for="topping">topping:</label>
            <input type="string" class="form-control" id="topping" name="topping">
        </div>
        <button type="submit" class="btn btn-default">Place Order</button>

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

