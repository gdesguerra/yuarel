<!-- Footer -->
<footer class="bg-dark text-white py-4 mt-4 text-center">
  <nav>
    <ul class="list-inline">
      <li class="list-inline-item mr-3"><a href="/">Home</a></li>
      <li class="list-inline-item mr-3"><a href="/terms">Terms</a></li>
      <li class="list-inline-item mr-3"><a href="/privacy">Privacy</a></li>
      @guest
        <li class="list-inline-item mr-3"><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
        <li class="list-inline-item"><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
      @else
        <li class="list-inline-item mr-3"><a href="/dashboard">Dashboard</a></li>
        <li class="list-inline-item">
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
        </li>
      @endguest
    </ul>
  </nav>

  <div>
      &copy; 2018 <a href="/">{{ config('app.name', 'Laravel') }}</a>. All rights reserved.
  </div>
</footer>