@extends('layouts.default')

@section('section')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Edit Post</h1>
            <form method="POST" action="../{{$post->id}}">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
                {{-- <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div> --}}
                <div class="form-group">
                    <label for="title">Post Title</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="{{ $post->title }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                {{-- <input type="submit" name="submit"> --}}
            </form>


            <form method="POST" action="../{{$post->id}}">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">
                {{-- <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div> --}}
                {{-- <div class="form-group">
                    <label for="title">Post Title</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="{{ $post->title }}">
                </div> --}}
                <button type="submit" class="btn btn-warning">Delete</button>
                {{-- <input type="submit" name="submit"> --}}
            </form>
        </div>
    </div>
@endsection