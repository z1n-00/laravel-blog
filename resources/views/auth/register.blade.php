@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <div class="row my-3">
                        <h3>{{ __('Register') }}</h3>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group my-3">
                            <label for="name">{{ __('Name') }}</label>

                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror
                            border-bottom
                            border-0
                            border-3
                            bg-white
                            rounded-0
                            border-primary" name="name" value="{{ old('name') }}" placeholder="Enter Name" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group my-3">
                            <label for="email">{{ __('Email Address') }}</label>

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror
                            border-bottom
                            border-0
                            border-3
                            bg-white
                            rounded-0
                            border-primary" name="email" value="{{ old('email') }}" placeholder="example@gmail.com" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group my-3">
                            <label for="password">{{ __('Password') }}</label>

                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror
                            border-bottom
                            border-0
                            border-3
                            bg-white
                            rounded-0
                            border-primary" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group my-3">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>

                            <input id="password-confirm" type="password" class="form-control
                            border-bottom
                            border-0
                            border-3
                            bg-white
                            rounded-0
                            border-primary" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="form-group my-3">
                            <button type="submit" class="form-control btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
