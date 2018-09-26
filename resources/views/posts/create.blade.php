@extends('main')

@section('title', 'Create a New Post')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}
@endsection

@section('content')
        <div class="row">
            <div class="col md-8 col-md-offset-2">
                <h1>Create New Post</h1>
                <hr>
                {{ csrf_field() }}
    
                {!!  Form::open(['route' => 'posts.store', 'data-parsley-validate' => '']) !!}
                    {{ Form::label('title', 'Title:')}}
                    {{ Form::text('title', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '255']) }}

                    {{ Form::label('slug', 'Slug:') }}
                    {{ Form::text('slug', null, ['class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255']) }}

                    {{ Form::label('category', 'Category:') }}
                    <select class="form-control" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}
                        @endforeach
                    </select>

                    {{ Form::label('tags', 'Tags:') }}
                    <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}
                        @endforeach
                    </select>
    
                    {{ Form::label('body', 'Body:')}}
                    {{ Form::textarea('body', null, ['class' => 'form-control', 'required' => ''])}}
    
                    {{ Form::submit('Create Post', ['class' => 'btn btn-success btn-block btn-lg submit-btn'])}}
                {!! Form::close() !!}
            </div>
        </div>
    
@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}

    <script type="text/javascript">
        $('.select2-multi').select2();
    </script>
@endsection