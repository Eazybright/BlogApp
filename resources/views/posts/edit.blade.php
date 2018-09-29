@extends('main')

@section('title', 'Edit Blog Post')

@section('stylesheets')
    {!! Html::style('css/select2.min.css') !!}
@endsection

@section('content')
    <div class="container spacing-bottom">
        <div class="row">
            <div class="col-md-8">
                <h1 class="text-center page-header">Update Blog - {{ $post->title }}</h1>
                {{ Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'files' => true]) }}
                    {{ Form::label('title', 'Title:') }}
                    {{ Form::text('title', null, ['class' => 'form-control']) }}

                    {{ Form::label('slug', 'Slug:', ['class' => 'spacing-top'])}}
                    {{ Form::text('slug', null, ['class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255']) }}

                    {{ Form::label('category_id', 'Category:', ['class' => 'spacing-top']) }}
                    {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}

                    {{ Form::label('tags', 'Tags:') }}
                    {{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}

                    {{ Form::label('image', 'Upload Image:', ['class'=> 'spacing-top']) }}
                    {{ Form::file('image', ['class' => 'form-control ']) }}

                    {{ Form::label('body', 'Body:', ['class' => 'spacing-top'])}}
                    {{ Form::textarea('body',null, ['class' => 'form-control editor']) }}
            </div>
        
            <div class="col-md-4 spacing-top">
                <div class="well">
                    <dl class="dl-horizontal">
                        <label>Created At:</label>
                        <p>{{ date('M j, Y H:ia', strtotime($post->created_at)) }}</p>
                    </dl>
                    <dl class="dl-horizontal">
                        <label>Updated At:</label>
                        <p>{{ date('M j, Y H:ia', strtotime($post->updated_at)) }}</p>
                    </dl>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            {!! Html::linkRoute('posts.show', 'Cancel', array($post->id), ['class' => 'btn btn-danger']) !!}
                        </div>
                        <div class="col-sm-6">
                            {{ Form::submit('Save Changes', ['class' => 'btn btn-success']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
                
                {{ Form::close() }}
    </div>    
    
@endsection

@section('scripts')
    {!! Html::script('js/select2.min.js') !!}

    <script type="text/javascript">
        $('.select2-multi').select2();
        $('.select2-multi').select2().val({!! json_encode($post->tags()->allRelatedIds()) !!}).trigger('change');
    </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
    <script type="text/javascript">
        ClassicEditor
        .create( document.querySelector( '.editor' ) )
        .catch( error => {
            console.error( error );
        } );
    </script>
@endsection