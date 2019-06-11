@extends('layouts.default')

@section('section')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Edit Post</h1>
            {{-- <form method="POST" action="../{{$post->id}}"> --}}
            {!! Form::model($post, ['method' => 'PATCH', 'action' => ['PostsController@update', $post->id ]]) !!}

                {{ csrf_field() }}

                <div class="form-group">
                    {!! Form::label('title', 'Title') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('Update Post', ['class' => 'btn btn-info']) !!}



                 {{-- BOOTSTRAP FORM --}}
                {{-- <div class="form-group">
                    <label for="title">Post Title</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="{{ $post->title }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button> --}}
                 {{-- BOOTSTRAP FORM --}}

            {{-- </form> --}}
            {!! Form::close() !!}


            {{-- <form method="POST" action="../{{$post->id}}"> --}}
            {!! Form::open(['method' => 'DELETE', 'action' => ['PostsController@destroy', $post->id ]]) !!}
                {{ csrf_field() }}
                {{-- <button type="submit" class="btn btn-warning">Delete</button> --}}
                {!! Form::submit('Delete Post', ['class' => 'btn btn-danger']) !!}
            {{-- </form> --}}
            {!! Form::close() !!}


        </div>
    </div>
@endsection