<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Assistant:wght@400;500&family=Noto+Sans+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,600&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('link')

    @stack('custom-style')
    <style>
        .navbar-brand {
            font-family: 'Assistant', sans-serif;
            color: #000000;
            font-size: 22px;
        }

        .nav-color a {
            color: #000000;
            text-decoration: none;
            font-family: 'Assistant', sans-serif;
            font-style: normal;
            font-weight: 400;
            font-size: 22px;
        }

        .nav-color a:hover {
            border-bottom: 3px solid #078FB7;
        }

        .nav-color a.active {
            border-bottom: 3px solid #078FB7;
        }

        .btn-login {
            width: 100.71px;
            height: 35.71px;
            background: #078FB7;
            border-radius: 20px;

            font-family: 'Assistant', sans-serif;
            font-style: normal;
            font-weight: 500;
            font-size: 18px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .btn-login:hover {
            background: #02524d;
        }

        .navbar {
            z-index: 3;
        }
    </style>
</head>

<body>
    <div id="app">
        @if (!(Request::is('login') || Request::is('register')))
            <nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm fixed-top">
                <div class="container">
                    <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                        <img src="/build/assets/Logo Ar-rahmah.jpg" alt="Logo" width="65" height="55"
                            alt="logo">
                        SIPON AL-RAHMAH
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul x-data="Nav()" class="navbar-nav nav-color ms-auto fw-normal"
                            x-init="init()">
                            <li class="nav-item"><a :class="(hash == '#beranda') ? 'active' : ''"
                                    href="#beranda">Beranda</a></li>
                            <li class="nav-item ms-3"><a :class="(hash == '#visi-misi') ? 'active' : ''"
                                    href="#visi-misi">Visi Misi</a></li>
                            {{-- <li class="nav-item ms-3"><a :class="(hash == '#gallery') ? 'active' : ''"
                                    href="#gallery">Gallery</a></li> --}}
                            <li class="nav-item ms-3"><a :class="(hash == '#sejarah') ? 'active' : ''"
                                    href="#sejarah">Sejarah</a></li>
                            <li class="nav-item ms-3"><a :class="(hash == '#kontak') ? 'active' : ''"
                                    href="#kontak">Kontak</a></li>
                        </ul>
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link btn-login text-white"
                                            href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif


                                <!-- @if (Route::has('register'))
    <li class="nav-item">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </li>
    @endif -->
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        @endif
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @stack('custom-script')

    @stack('link-script')
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        function Nav() {
            return {
                hash: '#beranda',
                init() {
                    setInterval(() => {
                        if (window.pageYOffset < 720)
                            this.hash = '#beranda';
                        else if (window.pageYOffset < 1500)
                            this.hash = '#visi-misi';
                        else if (window.pageYOffset < 2400)
                            this.hash = '#gallery';
                        else if (window.pageYOffset < 3100)
                            this.hash = '#sejarah';
                        else
                            this.hash = '#kontak';
                    }, 500);
                },
            }
        }
    </script>
</body>

</html>
