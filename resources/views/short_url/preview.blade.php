@extends('layouts.app')

@section('title', 'Preview')

@section('content')

<div class="container">
    @if(session('success'))
        <div class="row justify-content-center mb-3" role="alert">
            <div class="col-md-10 col-lg-8">
                <div class="alert alert-success alert-dismissible fade show">
                    {{session('success')}}

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
            </div>
        </div> 
    @endif

    @isset($shortenedUrl)
        <div class="row justify-content-center mb-3">
            <div class="col-9 col-sm-6 col-md-5 col-lg-4">
                <url-screenshot long-url="{{ $longUrl }}"></url-screenshot>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div>
                    <label>Long URL ({{ $longUrlLength }} characters):</label>
                    <p class="success-url">{{ $longUrl }}</p>
                </div>

                <div>
                    <label>Short URL ({{ $shortenedUrlLength }} characters):</label>
                    <p id="shortenedUrl" class="success-url">{{ $shortenedUrl }}</p>
                
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <a class="btn btn-secondary w-100" href="{{ $shortenedUrl }}" target="_blank"><i class="fa fa-external-link mr-1"></i>Open in new tab</a>
                        </div>

                        <div class="col-sm-6 mt-2 mt-sm-0">
                            <a class="copyText btn btn-secondary w-100" href="#" data-target="shortenedUrl"><i class="fa fa-clipboard mr-1"></i>Copy to clipboard</a>
                        </div>
                    </div>
                </div>
                
                <hr>

                <div>
                    <label>Give your recipients confidence with a preview:</label>
                    <p id="previewUrl" class="success-url">{{ $shortenedUrl }}/preview</p>
                
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <a class="btn btn-secondary w-100" href="{{ $shortenedUrl }}/preview" target="_blank"><i class="fa fa-external-link mr-1"></i>Open in new tab</a>
                        </div>

                        <div class="col-sm-6 mt-2 mt-sm-0">
                            <a class="copyText btn btn-secondary w-100" href="#" data-target="previewUrl"><i class="fa fa-clipboard mr-1"></i>Copy to clipboard</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endisset
</div>

@endsection
