<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('includes.navbar')
        
        <main>
          <div class="jumbotron jumbotron-fluid py-5">
            <div class="container text-center">
              <h1 class="display-4">@yield('title')</h1>
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
