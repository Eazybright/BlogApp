@extends('main')

@section('title', 'Welcome')

@section('content')
    <div class="container">
        <div class="row">
            <div class="jumbotron">
                <h1>Welcome to the BLOG!</h1>
                <p class="lead">Thanks for visiting this website. We are glad you came.</p>
                <p><a class="btn btn-primary btn-lg" href="{{ url('login') }}" role="button">Get Started</a></p>
              </div>
        </div>{{-- end of header row --}}

        <div class="row">
            <div class="col-md-8">
                @foreach ($post as $posts)
                    <div class="post">                        
                        <h3>{{ $posts->title }}</h3>
                        <p>{{ substr($posts->body, 0, 300) }} {{ strlen($posts->body) > 300 ? "..." : "" }}</p>
                        <p><a href="{{ url('blog/'.$posts->slug)}}" class="btn btn-primary">Read More</a></p>
                    </div>
                    <hr>
                @endforeach
            </div>

            <div class="col-md-3 col-md-offset-1">
                <div class="well">
                    <h2>Sidebar</h2>
                </div>
            </div>
        </div>
        

    </div>

@endsection