@extends('main')

@section('title', "$post->title")

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <strong><h1 class="lead">{{ $post->title }}</h1></strong>
                @if(isset($post->image))
                    <img src="{{ asset('uploads/'.$post->image) }}" class="img-fluid img-thumbnail rounded" alt="image" width="50%" height="50%">
                @else

                @endif
                <strong><p>Published at: {{ date('j M,Y', strtotime($post->created_at)) }}</p></strong>
                <p>{!! $post->body !!}</p>
                <hr>
                <p class="badge badge-pill indigo">{{ $post->category->name }}</p>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-md-8 col-md-offset">
            <h3 class="page-header"><span class="fa fa-comment"></span>  {{ $post->comments()->count() }} Comments</h3><br />
                @foreach($post->comments as $comment)
                    <div class="comment">
                        <div class="author-info">
                            <picture>
                            <img src="{{ "https://www.gravatar.com/avatar/".md5(strtolower(trim($comment->email)))."?s=50&d=mm" }}" class="img-fluid author-image" alt="image">
                            </picture>
                            <div class="author-name">
                                <h4>{{ $comment->name }}</h4>
                                <p class="author-time">{{ date('M j,Y h:i a',strtotime($comment->created_at)) }}</p>
                            </div>
                        </div>
                        <div class="comment-content">
                            <p>{!! $comment->comment !!}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div><hr>

        <div class="row">            
            <div id="comment-form" class="col-md-8 col-md-offset-2 spacing-bottom spacing-top">
                    <h3 class="text-center page-header">Add Comment</h3><br />
                {!! Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) !!}
                     <div class="row">
                         <div class="col-md-6">
                            {{ Form::label('name', 'Name:') }}
                            {{ Form::text('name', null, ['class' => 'form-control']) }}
                         </div>
                         <div class="col-md-6">
                            {{ Form::label('email', 'Email Address:') }}
                            {{ Form::email('email', null, ['class' => 'form-control']) }}
                         </div>
                         <div class="col-md-12">
                            {{ Form::label('comment', 'Comment:') }}
                            {{ Form::textarea('comment', null, ['class' => 'form-control editor', 'rows' => '5']) }}

                            {{ Form::submit('Add Comment', ['class' => 'btn btn-success spacing-top']) }}

                         </div>
                     </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
    <script type="text/javascript">
        ClassicEditor
        .create( document.querySelector( '.editor' ) )
        .catch( error => {
            console.error( error );
        } );
    </script>
@endsection