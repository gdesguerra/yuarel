<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="title" content="Yuarel - URL Shortener">
    <meta name="description" content="Generate Short URL that will redirect you to your Long URL.">
    <meta name="keywords" content="yuarel, yuarel.ml, URL, Long URL, Short URL, Shorten URL, Preview, Preview URL, URL Shortener, Gian Carlo Esguerra, gdesguerra">
    <meta name="robots" content="index, follow">
    <meta name="language" content="English">
    <meta name="revisit-after" content="90 days">
    <meta name="author" content="Gian Carlo Esguerra">

    <!-- Facebook meta -->
    <meta property="og:image:width" content="279">
    <meta property="og:image:height" content="279">
    <meta property="og:description" content="Generate Short URL that will redirect you to your Long URL.">
    <meta property="og:title" content="Yuarel">
    <meta property="og:url" content="{{ url('') }}">
    <meta property="og:image" content="{{ asset('img/og-image.jpg') }}">
    
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('favicon/safari-pinned-tab.svg') }}" color="#343a40">
    <meta name="msapplication-TileColor" content="#f5f8fa">
    <meta name="theme-color" content="#f5f8fa">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('includes.navbar')
        
        <main>
          <div class="jumbotron jumbotron-fluid py-5">
            <div class="container text-center">
              <h1 class="display-heading display-4">@yield('title')</h1>
              <p class="lead">@yield('subtitle')</p>
            </div>
          </div>

          @yield('content')
        </main>

        @include('includes.footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/vendor69SEF156HSDF15S6EF1S8RG641SD6F4S.js') }}"></script>
</body>
</html>
