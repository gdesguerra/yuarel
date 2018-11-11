@extends('layouts.app')

@section('title', 'URL shortener')
@section('subtitle', 'Create a short URL')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-8">
            <form class="mb-5" method="POST" action="{{ route('short_url.store') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="longUrl">Enter web address (URL) here:</label>
                    
                    <div class="input-group input-group-lg">
                        <input type="text" id="longUrl" class="form-control{{ $errors->has('long_url') ? ' is-invalid' : '' }}" name="long_url" value="{{ $errors->has('long_url') ? old('long_url') : request('url') }}" maxlength="2047" required autofocus>

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

                        <input type="text" id="customAlias" class="form-control{{ $errors->has('alias') ? ' is-invalid' : '' }}" name="alias" value="{{ old('alias') }}" maxlength="30" aria-label="Custom Alias" aria-describedby="customAlias">
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

            <div>
                <h5>Bookmarklet</h5>

                <p>
                    Drag this link to your browser's bookmarks bar:

                    <a href="javascript:void(location.href='{{ url('/') }}/?url='+encodeURIComponent(location.href))" onclick="return false">{{ config('app.name', 'Laravel') }}</a>
                </p>

                <p>
                    Once this is on your Bookmarks bar, you'll be able to make a Short URL with just two clicks. By clicking on the bookmark, It will redirect you to our website that's already filled up with url of the page you're currently at, ready to be shorten.
                </p>
            </div>
        </div>
    </div>
</div>

@endsection
