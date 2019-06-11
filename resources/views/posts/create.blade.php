@extends('layouts.default')

@section('section')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Create Post</h1>
            {{-- <form method="POST" action="../posts"> --}}

                {!! Form::open(['method' => 'POST', 'action' => 'PostsController@store']) !!}

                    {{ csrf_field() }}
                    <div class="form-group">
                        {{-- <label for="title">Post Title</label> --}}
                        {!! Form::label('title', 'Title') !!}
                        {!! Form::text('title', null, ['class' => 'form-control']) !!}
                        {{-- <input type="text" class="form-control" name="title" id="title" placeholder="Title"> --}}
                    </div>

                {!! Form::submit('Create Post', ['class' => 'btn btn-primary']) !!}


                {{-- BOOTSTRAP FORM --}}
                {{-- <div class="form-group">
                    <label for="title">Post Title</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Title">
                </div> --}}
                {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                {{-- BOOTSTRAP FORM --}}

            {{-- </form> --}}
            {!! Form::close() !!}

            @if (count($errors) > 0)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Holy guacamole!</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            @endif
        </div>
    </div>
@endsection