<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="SHORTCUT ICON" HREF="/img/logo.png">
    <title> @yield('title')</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-light bg-white shadow-sm">
            <div class="container">
                <img src="/img/logo.png" alt="" style="width:20px" >
                <a class="navbar-brand pl-1" href="{{ route ('home') }}">
                    {{ config(' Day in Malaysia', ' Day in Malaysia') }}
                </a>
                    <ul class="navbar-nav ml-auto">
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

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    <div class="container">
        <div class="row">
            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xm-12 ">
                @include('nav_bar')
            </div>
            <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-xm-12 ">
                @yield('content')
            </div>
            <div class="col-xl-3 col-lg-3  d-none d-lg-block"> 
                @include('friends')
            </div>
        </div>
    </div>

    <script src="http://unpkg.com/turbolinks"></script>

</body>
</html>
