@extends('main')

@section('title', 'Delete Comment')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Delete this Comment</h1>
                <p>
                    <strong>Name: </strong>{{ $comment->name }}<br>
                    <strong>Email: </strong>{{ $comment->email }}<br>
                    <strong>Comment: </strong>{{ $comment->comment }}
                </p>
                {!! Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE']) !!}
                    {{ Form::submit('Delete Comment', ['class' => 'btn btn-sm px-5 btn-danger', 'type' => 'button'])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection