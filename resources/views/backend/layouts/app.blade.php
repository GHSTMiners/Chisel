<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Chisel') }}</title>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js" integrity="sha512-3j3VU6WC5rPQB4Ld1jnLV7Kd5xr+cq9avvhwqzbH/taCRNURoeEpoPBK9pDyeukwSxwRPJ8fDgvYXd6SkaZ2TA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/js/bootstrap.bundle.min.js" integrity="sha512-trzlduO3EdG7Q0xK4+A+rPbcolVt37ftugUSOvrHhLR5Yw5rsfWXcpB3CPuEBcRBCHpc+j18xtQ6YrtVPKCdsg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/phaser/3.55.2/phaser.min.js" integrity="sha512-kg6fSrg6FkD9Ua02PzuA289KatVkTp6HdiFrSKwnz1bKBeKe5JG54rNeYZeghYO/I4ka49rb9H/9Ezcq9Se3iQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" deref/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" integrity="sha512-xnP2tOaCJnzp2d2IqKFcxuOiVCbuessxM6wuiolT9eeEJCyy0Vhcwa4zQvdrZNVqlqaxXhHqsSV1Ww7T2jSCUQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/css/bootstrap.min.css" integrity="sha512-6KY5s6UI5J7SVYuZB4S/CZMyPylqyyNZco376NM2Z8Sb8OxEdp02e1jkKk/wZxIEmjQ6DRCEBhni+gpr9c4tvA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    @include('backend.layouts.worldPicker')
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/administrator') }}">{{ config('app.name', 'Chisel') }}</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{str_contains(url()->current(), 'matter') ? 'active' : ''}}" href="#" id="matterDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ __('Matter')}}   
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="matterDropdown">
                                
                            <li> <a class="dropdown-item" href="#"> Crypto &raquo; </a>
                                <ul class="submenu dropdown-menu">
                                    <li>
                                    @if (Route::has('crypto.index'))
                                        <a class="dropdown-item  {{(!Route::is('crypto-spawns*') && Route::is('crypto*') )? 'active' : ''}}" href="{{ route('crypto.index') }}">{{ __('Edit crypto') }}</a>
                                    @endif
                                    </li>
                                    <li>
                                    @if (Route::has('crypto-spawns.index'))
                                        <a class="dropdown-item  {{Route::is('crypto-spawns*') ? 'active' : ''}}" href="{{ route('crypto-spawns.index') }}">{{ __('Edit spawns') }}</a>
                                    @endif
                                    </li>
                                </ul>
                            </li>

                                @if (Route::has('soil.index'))
                                    <a class="dropdown-item  {{Route::is('soil*') ? 'active' : ''}}" href="{{ route('soil.index') }}">{{ __('Soil') }}</a>
                                @endif

                            <li> <a class="dropdown-item" href="#"> Rocks &raquo; </a>
                                <ul class="submenu dropdown-menu">
                                    <li>
                                    @if (Route::has('rock.index'))
                                        <a class="dropdown-item  {{(!Route::is('rock-spawns*') && Route::is('rock*') ) ? 'active' : ''}}" href="{{ route('rock.index') }}">{{ __('Edit Rock') }}</a>
                                    @endif
                                    </li>
                                    <li>
                                    @if (Route::has('rock-spawns.index'))
                                        <a class="dropdown-item  {{Route::is('rock-spawns*') ? 'active' : ''}}" href="{{ route('rock-spawns.index') }}">{{ __('Edit spawns') }}</a>
                                    @endif
                                    </li>
                                </ul>
                            </li>

                            @if (Route::has('whitespace.index'))
                                    <a class="dropdown-item  {{Route::is('whitespace*') ? 'active' : ''}}" href="{{ route('whitespace.index') }}">{{ __('Whitespace') }}</a>
                                @endif
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{str_contains(url()->current(), 'gameplay') ? 'active' : ''}}" href="#" id="gameplayDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ __('Gameplay')}}   
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="gameplayDropdown">
                                @if (Route::has('vital.index'))
                                    <a class="dropdown-item  {{Route::is('vital*') ? 'active' : ''}}" href="{{ route('vital.index') }}">{{ __('Vitals') }}</a>
                                @endif
                                @if (Route::has('skill.index'))
                                    <a class="dropdown-item  {{Route::is('skill*') ? 'active' : ''}}" href="{{ route('skill.index') }}">{{ __('Skills') }}</a>
                                @endif
                                @if (Route::has('trait.index'))
                                    <a class="dropdown-item  {{(!Route::is('trait-effect*') && Route::is('trait*')) ? 'active' : ''}}" href="{{ route('trait.index') }}">{{ __('Traits') }}</a>
                                @endif

                                @if (Route::has('trait-effect.index'))
                                    <a class="dropdown-item  {{ Route::is('trait-effect*') ? 'active' : ''}}" href="{{ route('trait-effect.index') }}">{{ __('Traits Effects') }}</a>
                                @endif
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{str_contains(url()->current(), 'item') ? 'active' : ''}}" href="#" id="gameplayDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ __('Items')}}   
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="gameplayDropdown">
                                @if (Route::has('explosive.index'))
                                    <a class="dropdown-item  {{Route::is('explosive*') ? 'active' : ''}}" href="{{ route('explosive.index') }}">{{ __('Explosives') }}</a>
                                @endif
                                @if (Route::has('consumable.index'))
                                    <a class="dropdown-item  {{Route::is('consumable*') ? 'active' : ''}}" href="{{ route('consumable.index') }}">{{ __('Consumables') }}</a>
                                @endif
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{str_contains(url()->current(), 'world') ? 'active' : ''}}" href="#" id="gameplayDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ __('World')}}   
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="gameplayDropdown">
                                @if (Route::has('puzzle.index'))
                                    <a class="dropdown-item  {{Route::is('puzzle*') ? 'active' : ''}}" href="{{ route('puzzle.index') }}">{{ __('Puzzles') }}</a>
                                @endif
                            </ul>
                        </li>
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @auth
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
            <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#world-picker">{{ "Current world: ".$selectedWorld->name }}</button>
            <div>
            <button class="btn btn-sm btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#world-delete" @if(sizeof($worlds) == 1) disabled @endif>Delete</button>
            <button class="btn btn-sm btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#world-edit">Edit</button>
            <button class="btn btn-sm btn-success" type="button" data-bs-toggle="modal" data-bs-target="#world-add">Add</button>
            </div>
        </div>
        </nav>
        @endauth

        <!-- Messages -->
        @if (session('success'))
        <div class="container pt-4">
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        </div>
        @endif

        <!-- Notifications -->
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
