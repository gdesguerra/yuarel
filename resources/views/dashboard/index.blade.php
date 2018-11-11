@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

@include('includes.modal')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-10">
            @include('includes.message')

            <h1>Statistics</h1>

            @if(count($shortUrls) > 0)
                <div class="statistics">
                    <table class="table table-sm mb-0 mb-md-2" >
                        <thead>
                            <tr>
                                <th scope="col">Code</th>
                                <th scope="col">Alias</th>
                                <th scope="col">Long URL</th>
                                <th scope="col">Visits</th>
                                <th scope="col">Created At</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($shortUrls as $key => $shortUrl)
                                <tr>
                                    <td scope="row" data-label="Code">{{ $shortUrl->code }}</td>
                                    <td data-label="Alias">{{ $shortUrl->alias }}</td>
                                    <td data-label="Long Url" data-toggle="tooltip" data-placement="top" title="{{ $shortUrl->long_url }}">
                                        <a href="#" class="btn my-btn-sm btn-secondary d-md-none" data-toggle="long-url" data-target="long-url-{{ $key }}" onclick="return false"><i class="fa fa-eye mr-1"></i>Show</a>
                                        <a data-id="long-url-{{ $key }}" class="long-url d-none d-md-inline-block" href="{{ $shortUrl->long_url }}">
                                            {{ $shortUrl->long_url }}
                                        </a>
                                    </td>
                                    <td data-label="Visits">{{ $shortUrl->visits_count }}</td>
                                    <td data-label="Created At">
                                        {{ date('d-m-Y', strtotime($shortUrl->created_at)) }}
                                    </td>
                                    <td>
                                        <form method="POST" action="/short-url/{{ $shortUrl->id }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
        
                                            <a class="btn my-btn-sm btn-danger float-md-left delete-shortened-url" href="#">
                                                <i class="fa fa-trash mr-1 mr-md-0"></i><span class="d-sm-inline d-md-none">Delete</span>
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <small class="form-text text-muted mb-2">Short URL format is "{{ url('/CodeOrAlias') }}".</small>
                {{ $shortUrls->links() }}
            @else
                <h4>You have no Shorten URL.</h4>
            @endif
        </div>
    </div>
</div>

@endsection