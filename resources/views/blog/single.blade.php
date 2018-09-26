@extends('main')

@section('title', "$post->title")

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1 class="lead">{{ $post->title }}</h1>
                <strong><p>Published at: {{ date('j M,Y', strtotime($post->created_at)) }}</p></strong>
                <p>{{ $post->body }}</p>
                <hr>
                <p>Category: {{ $post->category->name }}</p>
            </div>
        </div>

        {{-- <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach($post->comments as $comment)
                    <div class="author-info">
                        <img src="" class="author-image">
                        <div class="author-name">
                            {{ $comment->name }}
                            {{ $comment->created_at }}
                        </div>
                    </div>
                    <div class="comment-content">
                        {{ $comment->comment}}
                    </div>
                @endforeach
            </div>
        </div> --}}
    </div>
@endsection