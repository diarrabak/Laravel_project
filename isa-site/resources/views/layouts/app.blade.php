<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Bootstrap core CSS -->
  <link href="https://getbootstrap.com/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>

<body>
  <header>
    <div class="nav-top">
      <div class="row logo-login">

        <div class="col-12 col-sm-6">
          <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
          </a>
        </div>
        <div class="col-12 col-sm-6">
          <ul>
            <!-- Authentication Links -->
            @if (Route::has('login'))
            @guest
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
              <!--a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a-->
              <a class="nav-link" href="{{ route('users.create') }}">{{ __('Register') }}</a>
            </li>
            @endif
            @else
            <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </li>
            @endguest
            @endif
            <li>
              <form class="form-inline mt-2 mt-md-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
              </form>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li><a class="nav-link" href="{{ url('/') }}">{{ __('Home') }}</a></li>
          <li><a class="nav-link" href="{{ route('departments.index') }}">{{ __('Faculties') }}</a></li>
          <li><a class="nav-link" href="{{ route('laboratories.index') }}">{{ __('Laboratories') }}</a></li>
          <li><a class="nav-link" href="{{ url('/student') }}">{{ __('Students') }}</a></li>
          <li><a class="nav-link" href="{{ url('/alumni') }}">{{ __('Alumni') }}</a></li>
          <li><a class="nav-link" href="{{ route('informations.index') }}">{{ __('News') }}</a></li>
        </ul>

      </div>
    </nav>
  </header>

  <main role="main">
    <div class="row">
      <!-- Buttons -->
      @yield('buttons')
    </div>
    <div class="container mt-1">
      <!--div class="row"-->
      <!-- Content -->
      @yield('content')
      <!--/div-->
    </div>
  </main>

  <!-- FOOTER -->
  <footer class="container">
    <div class="row">
      <p class="float-right"><a href="#">Back to top</a></p>
      <p>&copy; 2021, Diarra. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
    </div>
  </footer>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script>
    window.jQuery || document.write('<script src="https://getbootstrap.com/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')
  </script>
  <script src="https://getbootstrap.com/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
</body>

</html>