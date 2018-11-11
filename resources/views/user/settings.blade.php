@extends('layouts.app')

@section('title', 'Account Settings')

@section('content')

<div class="container">
    @isset($user)
        <div class="row justify-content-center">
            <div class="col-sm-9 col-md-7 col-lg-5">
                @include('includes.message')

                <form method="POST" action="{{ route('user.update') }}" aria-label="{{ __('Account Settings') }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>

                        <div>
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $errors->has('name') ? old('name') : $user->name }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">{{ __('E-Mail Address') }}</label>

                        <div>
                            <input id="email" type="email" class="form-control" value="{{ $user->email }}" disabled>
                        </div>
                    </div>

                    <hr>

                    <h4>Change Password</h4>
                    <small id="customAliasHelp" class="form-text text-muted"><i class="fa fa-info-circle mr-1"></i>Leave blank to remain unchange.</small>

                    <hr>

                    <div class="form-group">
                        <label for="current-password">{{ __('Current Password') }}</label>

                        <div>
                            <input id="current-password" type="password" class="form-control{{ $errors->has('current_password') ? ' is-invalid' : '' }}" name="current_password">

                            @if ($errors->has('current_password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('current_password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="new-password">{{ __('New Password') }}</label>

                        <div>
                            <input id="new-password" type="password" class="form-control{{ $errors->has('new_password') ? ' is-invalid' : '' }}" name="new_password">

                            @if ($errors->has('new_password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('new_password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password-confirm">{{ __('Confirm Password') }}</label>

                        <div>
                            <input id="password-confirm" type="password" class="form-control" name="new_password_confirmation">
                        </div>
                    </div>

                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-secondary btn-lg w-100">
                            {{ __('Save Changes') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endisset
</div>
@endsection