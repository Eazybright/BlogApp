@extends('main')

@section('title', 'Resend Email')

@section('content')
    <section class="form-simple">
        <h3 class="deep-grey-text mt-3 mb-4 pb-1 mx-5 text-center font-weight-bold" >Resend Activation Email</h3>
        <hr>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @if (session('warning'))
            <div class="alert alert-warning">
                {{ session('warning') }}
            </div>
        @endif
        <div class="card-body">
            <form method="POST" action="{{ route('auth.activate.resend') }}" aria-label="">
                @csrf

                <div class="form-group row">
                    <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                
                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Resend Link
                        </button>
                    </div>
                </div>
            </form><br>
            
        </div>
    </section>
@endsection
