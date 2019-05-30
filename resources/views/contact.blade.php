@extends('layouts.default')

@section('section')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Contact Page</h1>
            @isset($people)
                <ul>
                    @foreach ($people as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            @endisset
            <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
        </div>
    </div>
@endsection