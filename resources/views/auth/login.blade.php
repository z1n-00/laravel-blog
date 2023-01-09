@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <div class="row my-3">
                        <h3> {{__('Login') }}</h3>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group my-4">
                            <label for="email">
                                {{ __('Email Address') }}
                            </label>

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror 
                                border-bottom
                                border-0
                                border-3
                                bg-white
                                rounded-0
                                border-primary" name="email" value="{{ old('email') }}" placeholder="example@gmail.com" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group my-4">
                            <label for="password">{{ __('Password') }}</label>
                            
                            <input id="password" type="password" 
                                class="form-control @error('password') is-invalid @enderror
                                border-bottom
                                border-0
                                border-3
                                bg-white
                                rounded-0
                                border-primary" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>

                        <div class="row my-3">
                            <button type="submit" class="form-control btn btn-primary">
                                {{ __('Login') }}
                            </button>
                        </div>

                        <div class="row justify-content-center">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link text-decoration-none" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
