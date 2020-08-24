@extends('layouts.app')

@section('content')
    <div class="container ">
        <div class="row">


            @foreach($posts as $post)
                <div class="col-sm-3">
                    <div class="card text-center" >
                        <img src="{{asset('uploads/'. $post->img)}}" class="card-img-top" alt="img">
                        <div class="card-body">
                            <h5 class="card-title">{{$post->title}}</h5>
                            <p class="card-text">{{$post->description}}</p>
                            <span>
                        <a href="/update-post/{{$post->id}}" class="btn btn-primary">Edit</a>
                        <a href="/delete-post/{{$post->id}}" class="btn btn-danger">Delete</a>
                        <a href="{{route('status', $post->id)}}"
                           class="btn btn-danger">{{$post->status == 1 ? "Active" : "Inactive"}}</a>
                    </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
