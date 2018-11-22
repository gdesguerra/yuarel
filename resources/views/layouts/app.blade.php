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
    <div id="app">
        @include('includes.navbar')
        
        <header>
          <div class="jumbotron jumbotron-fluid py-5">
            <div class="container text-center">
              <h1 class="display-heading display-4">@yield('title')</h1>
              <p class="lead">@yield('subtitle')</p>
            </div>
          </div>
        </header>
        
        <main>
          @yield('content')
        </main>

        @include('includes.footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/vendor69SEF156HSDF15S6EF1S8RG641SD6F4S.js') }}"></script>
</body>
</html>
