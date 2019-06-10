@extends('layouts.default')

@section('section')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Blog Page</h1>
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-md-4 col-12">
                        <div class="card mb-3">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Go to post</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection