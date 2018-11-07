@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

@include('includes.modal')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('success')}}

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <h1>Statistics</h1>

            @if(count($shortUrls) > 0)
                <div class="statistics">
                    <table class="table table-sm" >
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
                                        <a href="#" class="btn my-btn-sm btn-secondary d-md-none" data-toggle="long-url" data-target="long-url-{{ $key }}" onclick="return false">Toggle</a>
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

                                            <a class="btn my-btn-sm btn-danger float-md-left delete-shortened-url" href="#"> Delete</a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <small class="form-text text-muted">Short URL format is "{{ url('/CodeOrAlias') }}".</small>
                {{ $shortUrls->links() }}
            @else
                <h4>You have no Shorten URL.</h4>
            @endif
        </div>
    </div>
</div>

@endsection