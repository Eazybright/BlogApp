@extends('main')

@section('title', 'tags')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Tags</h1>

                <table class="table table-responsive table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    @foreach($tags as $tag)
                        <tbody>
                            <th>{{ $tag->id }}</th>
                            <td><a href="{{ route('tags.show', $tag->id) }}"> {{ $tag->name }}</a></td>
                        </tbody>
                    @endforeach
                </table>
            </div>{{-- end of col-8 --}}

            <div class="col-md-3">
                <div class="well spacing-top">
                    {!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}
                        <h2>New Tag</h2>
                        {{ Form::label('name', 'Name:') }}
                        {{ Form::text('name', null), ['class' => 'form-control'] }}<br><br>

                        {{ Form::submit('Add Tag', ['class' => 'btn btn-info spacing-top', 'role' => 'button'])}}<br><br>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <hr>
@endsection