<html>
    <head>
         <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
            <style>
                    body {
                      margin: 0;
                      font-family: "Lato", sans-serif;
                    }

                    .sidebar {
                      margin: 0px;
                      margin-top: -60px;

                      padding: 0;
                      width: 250px;
                      background-color: #343a40;
                      position: fixed;
                      height: 100%;
                      overflow: auto;
                    }

                    .sidebar a {
                      display: block;
                      color: white;
                      padding: 16px;
                      text-decoration: none;
                    }

                    .sidebar a.active {
                      background-color: #4CAF50;
                      color: white;
                    }

                    .sidebar a:hover:not(.active) {
                      background-color: #555;
                      color: white;
                    }

                    div.content {
                      margin-left: 200px;
                      padding: 1px 16px;
                      height: 1000px;
                    }

                    @media screen and (max-width: 700px) {
                      .sidebar {
                        width: 100%;
                        height: auto;
                        position: relative;
                      }
                      .sidebar a {float: left;}
                      div.content {margin-left: 0;}
                    }

                    @media screen and (max-width: 400px) {
                      .sidebar a {
                        text-align: center;
                        float: none;
                      }
                    }
                    </style>
    </head>
    <body>

            <div id="app">
                    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                        <div class="container">
                            <a class="navbar-brand" href="{{ url('/') }}">
                                {{ config('app.name', 'Laravel') }}
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <!-- Left Side Of Navbar -->
                                <ul class="navbar-nav mr-auto">

                                </ul>

                                <!-- Right Side Of Navbar -->
                                <ul class="navbar-nav ml-auto">
                                    <!-- Authentication Links -->
                                    @guest
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                        @if (Route::has('register'))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                            </li>
                                        @endif
                                    @else

                                        <li class="nav-item">
                                                <a href="{{route ('users.index')}}">List users</a><br>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{ Auth::user()->name }} <span class="caret"></span>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                    @endguest
                                </ul>
                            </div>
                        </div>
                    </nav>


                </div>

            <div class="sidebar">
                    <a class="active" href="{{ route('home')}}">Home</a>
                    <a href="{{ route('users.index')}}">User List</a>
                    <a href="#about">About</a>
                    </div>

                  <div class="content">
                        <main class="py-4">
                                @yield('content')
                        </main>
                  </div>
    </body>
</html>
