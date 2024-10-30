<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>

    <meta name="title" content="Evening desert safari dubai | desert safari dubai | rental cars">
    <meta name="description"
        content="Experience Dubai most popular Evening desert safari dubai This thrilling adventure includes delicious BBQ dinner, and rent a car in dubai. rental cars">
    <meta name="keywords"
        content="evening desert safari dubai, desert safari dubai, rental cars, vehicle rental near me, auto rental near me, desert safari dubai booking, dubai trip package, dubai vacation packages, dubai package, dubai travel package, dubai desert safari packages, tours in dubai, morning desert safari dubai, desert safari dubai offers, desert trip dubai, desert safari dubai deals">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-VSY6H16C62"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-VSY6H16C62');
    </script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#0E0E0E">
    <meta name="template-color" content="#0E0E0E">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!! settings('HeadElement') !!}
    {!! meta() !!}

    <script src="{{ asset('assets/js/axios.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/imgs/template/logo.png') }}">
    <link href=" {{ asset('assets/css/style.css?v=1.0.0') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js"></script>
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">

</head>



<body>
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <div class="spinning-coin-fall"></div>
                </div>
            </div>
        </div>
    </div>
    <header class="header sticky-bar">
        <div class="top-bar">
            <div class="container-fluid">
                <div class="text-header">
                    <div class="text-move">
                        <a class="link-secondary-2" href="{{ route('tours.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                fill="none">
                                <path d="M8 3.33325L3.33333 7.99992L8 12.6666M3.33333 7.99992L12.6667 7.99992"
                                    stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                            </svg>
                            Get This Now
                        </a>
                        <div class="text-unlock text-sm-bold">{{ settings('NEWS') }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid background-body">
            <div class="main-header">
                <div class="header-left">
                    <div class="header-logo"><a class="d-flex" href="{{ route('home') }}"><img class="light-mode"
                                alt="Travila" src="{{ asset('assets/imgs/template/logo.png') }}"><img class="dark-mode"
                                alt="Travila" src="{{ asset('assets/imgs/template/logo.png') }}"></a></div>
                    <div class="header-nav">
                        <nav class="nav-main-menu">
                            <ul class="main-menu">
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li><a href="{{ route('tours.index') }}">Tours</a></li>
                                <li><a href="{{ route('rentals.index') }}">Rental</a></li>
                                <li><a href="{{ route('posts.index') }}">Blog</a></li>
                                <li class="acti"><a href="{{ route('activities.index') }}">Activities</a></li>
                                <li class="attract"><a href="{{ route('attractions.index') }}">Attractions</a></li>
                                <li class="dest"><a href="{{ route('destinations.index') }}">Destinations</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="header-right">
                    {{-- <div class="d-none d-xxl-inline-block box-dropdown-cart align-middle mr-15"><span
                            class="text-14-medium icon-list icon-account icon-lang"><span
                                class="text-14-medium arrow-down">EN</span></span>
                        <div class="dropdown-account">
                            <ul>
                                <li><a class="text-sm-medium" href="#">English</a></li>
                                <li><a class="text-sm-medium" href="#">French</a></li>
                                <li><a class="text-sm-medium" href="#">Chiness</a></li>
                            </ul>
                        </div>
                    </div> --}}
                    <form action="{{ route('change.currency') }}" id="currencyForm" method="POST">
                        @csrf
                        <div class="d-none d-md-inline-block box-dropdown-cart align-middle mr-50">
                            <span class="text-14-medium icon-list icon-cart">
                                <span class="text-14-medium arrow-down">{{ session('currency', 'AED') }}</span>
                            </span>
                            <div class="dropdown-cart">
                                <ul>
                                    <li>
                                        <a class="text-sm-medium currency-option" href="#"
                                            data-value="AED">AED</a>
                                    </li>
                                    <li>
                                        <a class="text-sm-medium currency-option" href="#"
                                            data-value="EUR">EUR</a>
                                    </li>
                                    <li>
                                        <a class="text-sm-medium currency-option" href="#"
                                            data-value="USD">USD</a>
                                    </li>
                                    <li>
                                        <a class="text-sm-medium currency-option" href="#"
                                            data-value="SAR">SAR</a>
                                    </li>
                                    <li>
                                        <a class="text-sm-medium currency-option" href="#"
                                            data-value="CNY">CNY</a>
                                    </li>
                                </ul>
                            </div>
                            <input type="hidden" id="selectedCurrency" name="currency"
                                value="{{ session('currency', 'AED') }}">
                        </div>
                    </form>

                    <div class="d-none d-xxl-inline-block align-middle mr-15"><a
                            class="btn btn-mode change-mode mr-15" href="#" data-bs-theme-value="dark"> <img
                                class="light-mode" src="{{ asset('assets/imgs/template/icons/light.svg') }}"
                                alt="Travila"><img class="dark-mode"
                                src="{{ asset('assets/imgs/template/icons/light-w.svg') }}" alt="Travila"></a>
                    </div>
                    <div style="height: 42px;" class=" burger-icon-white">
                    </div>
                    <div class="burger-icon burger-icon-white"><span class="burger-icon-top"></span><span
                            class="burger-icon-mid"></span><span class="burger-icon-bottom"></span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar button-bg-2 sidebar-active">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-logo"> <a class="d-flex" href="{{ route('home') }}"><img class="light-mode"
                        alt="Travila" src="{{ asset('assets/imgs/template/logo.png') }}"><img class="dark-mode"
                        alt="Travila" src="{{ asset('assets/imgs/template/logo.png') }}"></a>
                <div class="burger-icon burger-icon-white"></div>
            </div>
            <div class="mobile-header-content-area">
                <div class="perfect-scroll">
                    <div class="mobile-menu-wrap mobile-header-border">
                        <nav>
                            <ul class="mobile-menu font-heading">
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li><a href="{{ route('tours.index') }}">Tours</a></li>
                                <li><a href="{{ route('rentals.index') }}">Rental</a></li>
                                <li><a href="{{ route('posts.index') }}">Blog</a></li>
                                <li><a href="{{ route('activities.index') }}">Activities</a></li>
                                <li><a href="{{ route('attractions.index') }}">Attractions</a></li>
                                <li><a href="{{ route('destinations.index') }}">Destinations</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
