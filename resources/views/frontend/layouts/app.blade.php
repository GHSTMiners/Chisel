<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Gotchiminer</title>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/js/bootstrap.bundle.min.js" integrity="sha512-trzlduO3EdG7Q0xK4+A+rPbcolVt37ftugUSOvrHhLR5Yw5rsfWXcpB3CPuEBcRBCHpc+j18xtQ6YrtVPKCdsg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/home.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/phaser/3.55.2/phaser.min.js" integrity="sha512-kg6fSrg6FkD9Ua02PzuA289KatVkTp6HdiFrSKwnz1bKBeKe5JG54rNeYZeghYO/I4ka49rb9H/9Ezcq9Se3iQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/7.2.0/swiper-bundle.min.css" integrity="sha512-BYn1UZcpzkgi4cForzUzU/FqsewIcfXDYAU0tThFfehimrUrp5hOtcWPI1Wpli8rKopUIhaDCbxXPttBDTISgA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" integrity="sha512-xnP2tOaCJnzp2d2IqKFcxuOiVCbuessxM6wuiolT9eeEJCyy0Vhcwa4zQvdrZNVqlqaxXhHqsSV1Ww7T2jSCUQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/css/bootstrap.min.css" integrity="sha512-6KY5s6UI5J7SVYuZB4S/CZMyPylqyyNZco376NM2Z8Sb8OxEdp02e1jkKk/wZxIEmjQ6DRCEBhni+gpr9c4tvA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/frontend.css') }}" deref/>
    @yield('head')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg sticky-top navbar-dark">
            <div class="container-fluid px-4">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/assets/images/logo.svg" alt="" width="100" height="50">
                  </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                        <li class="nav-item">
                            <a class="nav-link  {{Route::is('leaderboard*') ? 'active' : ''}}" href="{{ route('leaderboard') }}">{{ __('Leaderboard') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Players</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{Route::is('about*') ? 'active' : ''}}" href="{{ route('about') }}">{{ __('About') }}</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <!-- Authentication Links -->
                        <div class="btn-wallet">
                            <img class="btn-wallet-bottom"/>
                            <img class="btn-wallet-top"/>
                            @if(isset($connected_wallet))
                            <h1 class="btn-wallet-text">My Account</h1>
                            @else
                            <h1 class="btn-wallet-text">Connect wallet</h1>
                            @endif
                        </div>
                    </ul>
                </div>
            </div>
        </nav>
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
