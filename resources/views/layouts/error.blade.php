<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('includes.meta')
    
    @include('includes.favicon')

    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <a href="/">
        <img class="mx-auto my-4 fixed-top" style="height: 40px" src="{{asset('img/logo-dark.png')}}" alt="logo">
    </a>

    <div style="height: 100vh;">
        <div class="container d-flex justify-content-center align-items-center h-100">
            <h1 class="text-center text-secondary">@yield('message')</h1>
        </div>
    </div>
</body>
</html>
