@extends('layouts.app')

@section('title', 'Preview')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @isset($shortenedUrl)
                <label>Long URL ({{ $longUrlLength }} characters)</label>
                <p class="success-url">{{ $longUrl }}</p>

                <label>Short URL ({{ $shortenedUrlLength }} characters)</label>
                <p id="shortenedUrl" class="success-url">{{ $shortenedUrl }}</p>
            
                <div class="text-center">
                    <a class="btn btn-secondary" href="{{ $shortenedUrl }}" target="_blank"><i class="fa fa-external-link mr-1"></i>Open in new tab</a>

                    <a id="copyShortenedUrl" class="btn btn-secondary" href="#"><i class="fa fa-clipboard mr-1"></i>Copy to clipboard</a>
                </div>
            @endisset
        </div>
    </div>
</div>

@endsection
