@extends('layouts.app')

@section('title', 'Log In')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-9 col-md-7 col-lg-5">
            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="email">{{ __('E-Mail Address') }}:</label>

                    <div>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">{{ __('Password') }}:</label>

                    <div>
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-secondary btn-lg w-100">
                        {{ __('Login') }}
                    </button>
                </div>
            </form>

            <div class="d-flex justify-content-between">
                <a href="{{ route('password.request') }}">
                    Forgot your password?
                </a>
                <a href="{{ route('register') }}">
                    Don't have an account?
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
