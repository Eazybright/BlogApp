@extends('main')

@section('title', 'View Post')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>{{ $post->title }}</h1>
                <p class="lead">{!! $post->body !!}</p>
                @if(isset($post->image))
                    <img src="{{ asset('storage/images/'.$post->image) }}" class="img-fluid img-thumbnail rounded" alt="image" width="50%" height="50%">
                @else
                @endif
                <hr>
                <div class="tags">
                    @foreach($post->tags as $tag)
                        <span class="badge badge-pill indigo">{{ $tag->name}}</span>
                    @endforeach
                </div><hr>
                <div id="comment" class="spacing-top">
                    <h3>Comments  <small>{{ $post->comments()->count() }} in total</small></h3>
                    <table class="table table-responsive table-hover">
                        <thead>
                            <tr>    
                                <th>Name</th>
                                <th>Email</th>
                                <th>Comments</th>
                                <th width="20%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($post->comments as $comment)
                                <tr>
                                    <td>{{ $comment->name }}</td>
                                    <td>{{ $comment->email }}</td>
                                    <td>{!! $comment->comment !!}</td>
                                    <td>
                                        <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-sm btn-primary px-3"><span class="fa fa-pencil-square"></span></a>
                                        <a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-sm btn-danger px-3"><span class="fa fa-trash"></span></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
                            {!! Html::linkRoute('posts.edit', 'Edit', [$post->id], ['class' => 'btn px-5 btn-elegant']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
                                {{ Form::submit('Delete', ['class' => 'btn btn-sm px-5 btn-danger', 'type' => 'button'])}}
                            {!! Form::close() !!}
                        </div><br />
                        <div class="col-md-12">
                            {!! Html::linkRoute('blog.index', '<< See All Posts', array(), ['class' => 'btn btn-default 
                                btn-block spacing-top', 'style' => 'margin-bottom: 10px;']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><hr>
    
@endsection