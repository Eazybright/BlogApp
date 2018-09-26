@extends('main')

@section('title', 'View Post')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>{{ $post->title }}</h1>
                <p class="lead">{{ $post->body }}</p>
                <hr>
                <div class="tags">
                    @foreach($post->tags as $tag)
                        <span class="label label-default">{{ $tag->name}}</span>
                    @endforeach
                </div>
                
            </div>
            <div class="col-md-4">
                <div class="well">
                    <dl class="dl-horizontal">
                        <label>URL:</label>
                        <p><a href="{{ route('blog.single', $post->slug) }}">{{ url('blog/'.$post->slug) }}</a></p>
                    </dl>
                    <dl class="dl-horizontal">
                            <label>Category:</label>
                            <p>{{ $post->category->name }}</p>
                        </dl>
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
                        <div class="col-md-6">
                            {!! Html::linkRoute('posts.edit', 'Edit', [$post->id], ['class' => 'btn btn-primary btn-block']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
                                {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block'])}}
                            {!! Form::close() !!}
                        </div><br />
                        <div class="col-md-12">
                            {!! Html::linkRoute('posts.index', '<< See All Posts', array(), ['class' => 'btn btn-default btn-block spacing-top']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    
@endsection