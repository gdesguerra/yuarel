@extends('layouts.app')

@section('title', 'URL shortener')
@section('subtitle', 'Create a short URL')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form class="mb-5" method="POST" action="{{ route('ShortUrl.store') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="longUrl">Enter web address (URL) here:</label>
                    
                    <div class="input-group input-group-lg">
                        <input type="text" id="longUrl" class="form-control{{ $errors->has('long_url') ? ' is-invalid' : '' }}" name="long_url" value="{{ old('long_url') }}" required autofocus>

                        <div class="input-group-append">
                            <input type="submit" value="Shorten" class="btn btn-outline-secondary">
                        </div>
                    </div>

                    @if ($errors->has('long_url'))
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $errors->first('long_url') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="customAlias">Custom alias (optional):</label>

                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text">{{ url('/') }}/</span>
                        </div>

                        <input type="text" id="customAlias" class="form-control{{ $errors->has('alias') ? ' is-invalid' : '' }}" name="alias" value="{{ old('alias') }}" aria-label="Custom Alias" aria-describedby="customAlias">
                    </div>

                    <small id="customAliasHelp" class="form-text text-muted">May contain letters, numbers, dashes and underscores.</small>

                    @if ($errors->has('alias'))
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $errors->first('alias') }}</strong>
                        </span>
                    @endif
                </div>
            </form>

            <hr>

            <div class="mb-5">
                <h5>Bookmarklet</h5>
                <p>
                    Drag this link to your browser's bookmarks bar to shorten URLs on click:

                    <a href="javascript:void(location.href='{{ url('/') }}/?url='+encodeURIComponent(location.href))">{{ config('app.name', 'Laravel') }}</a>
                </p>
            </div>
        </div>
    </div>
</div>

@endsection
