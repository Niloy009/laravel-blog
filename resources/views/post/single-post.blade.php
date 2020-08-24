@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">

                <div class="post-preview">
                    <h2 class="post-title">
                        {{$post->title}}
                    </h2>
                    <h3 class="post-subtitle">
                        {{$post->description}}
                    </h3>

                </div>
            </div>
        </div>
    </div>
@endsection
