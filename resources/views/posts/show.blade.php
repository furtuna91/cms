@extends('layouts.default')

@section('section')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Post number</h1>
            <div class="row">
                <div class="col-md-4 col-12">
                    <div class="card mb-3">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit post</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection