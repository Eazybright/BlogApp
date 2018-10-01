@extends('main')

@section('title', 'Edit comment')

@section('content')
    <div class="container spacing-bottom">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1 class="text-center page-header">Edit comment </h1>
                {{ Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'PUT']) }}
                    {{ Form::label('name', 'Name:') }}
                    {{ Form::text('name', null, ['class' => 'form-control', 'disabled' => 'disabled']) }}

                    {{ Form::label('email', 'Email address:', ['class' => 'spacing-top'])}}
                    {{ Form::email('email', null, ['class' => 'form-control', 'disabled' => 'disabled']) }}

                    {{ Form::label('comment', 'Comment:', ['class' => 'spacing-top']) }}
                    {{ Form::textarea('comment', null, ['class' => 'form-control editor']) }}

                    {{ Form::submit('Update comment', ['class' => 'btn btn-success spacing-top fa fa-send']) }}

                {{ Form::close() }}
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