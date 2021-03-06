@extends('layouts.app')
@section('content')
    @auth
        <div class="container">
            <div class="row">
                <div class="col-md-12 offset-md-3">
                    <form method="POST" action="{{route('post.add')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Post Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter Post Title">
                        </div>
                        <div class="form-group">
                            <label for="description">Post Description</label>
                            <textarea name="description" id="description" rows="3" class="form-control"
                                      placeholder="Enter Post Description"></textarea>
                        </div>
                        <div class="form-group custom-file">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            <input type="file" name="image" class="custom-file-input" id="inputGroupFile01"
                                   aria-describedby="inputGroupFileAddon01">

                        </div>
                        <div class="py-2 text-center">
                            <input type="submit" value="Add Post" class=" btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endauth
@endsection


