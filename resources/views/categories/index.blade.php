@extends('main')

@section('title', 'Categories')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Categories</h1>

                <table class="table table-responsive table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    @foreach($categories as $category)
                        <tbody>
                            <th>{{ $category->id }}</th>
                            <td>{{ $category->name }}</td>
                        </tbody>
                    @endforeach
                </table>
            </div>{{-- end of col-8 --}}

            <div class="col-md-3">
                <div class="well spacing-top">
                    {!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
                        <h2>New Category</h2>
                        {{ Form::label('name', 'Name:') }}
                        {{ Form::text('name', null), ['class' => 'form-control'] }}

                        {{ Form::submit('Add Category', ['class' => 'btn btn-info spacing-top', 'role' => 'button'])}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
