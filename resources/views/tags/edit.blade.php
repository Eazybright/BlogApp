@extends('main')

@section('title', 'Edit Tag')

@section('content')
    <div class="container">
        <div class="row">
            <h1 class="page-header">Edit Tag</h1>
            {!! Form::model($tags, ['route' => ['tags.update', $tags->id], 'method' => 'PUT']) !!}
                {{ Form::label('name', 'Name:') }}
                {{ Form::text('name', null, ['class' => 'form-control spacing-top']) }}
                <div class="row">
                    <div class="col-md-6">
                        {!! Html::linkRoute('tags.show', 'Cancel', array($tags->id), ['class' => 'btn btn-danger spacing-top']) !!}
                        {{ Form::submit('Save Changes', ['class' => 'spacing-top btn btn-success'])}}
                    </div>
                </div>
            {!! Form::close()!!}
        </div>
    </div>
@endsection