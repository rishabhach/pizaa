@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <div class="album py-5 bg-light">
                            <div class="container">
                                <div class="row">
                                @foreach($posts as $post)


                                        <div class="col-md-6">
                                            <div class="card mb-4 box-shadow">
                                                <img class="card-img-top" src="view/image/img.jpeg" alt="Card image cap">
                                                <a href="{{route('post.show',$post->id)}}">
                                                <div class="card-body">
                                                    <p class="card-text">{{$post->description}}</p>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-sm btn-outline-secondary">cost : {{$post->cost}}</button>
                                                            <button type="button" class="btn btn-sm btn-outline-secondary">{{$post->veg==1?'veg':'non-veg'}}</button>
                                                            <button type="button" class="btn btn-sm btn-outline-secondary">{{$post->is_available==1?'available':'out of stock'}}</button>
                                                        </div>
                                                        <div>
                                                            <p>click to order</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                </a>
                                            </div>

                                        </div>


                                @endforeach
                                </div>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
