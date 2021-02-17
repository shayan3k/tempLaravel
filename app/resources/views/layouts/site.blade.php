<?php
$main_setting = \App\MainSetting::first();
$single_setting = \App\SingleSetting::first();
$image_setting = \App\ImagesSetting::first();
$section_five = \App\SectionFiveSetting::first();
?>

<!DOCTYPE html>
<html lang="fa">

<head>

    <meta charset="utf-8" />
    <title>{{ $single_setting['title'] }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


    <link rel="shortcut icon" href="{{ asset('resources/upload/logos/' . $image_setting['favicon']) }}">


    <link rel="stylesheet" href="{{ asset('resources/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/css/skins/orange.css') }}">

    <link rel="alternate stylesheet" type="text/css" title="orange"
        href="{{ asset('resources/css/skins/orange.css') }}" />
    <script src="{{ asset('resources/js/modernizr.js') }}"></script>

</head>

<body class="{{ $class }}">

    <div id="preloader">
        <div id="preloader-content">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="150px" height="150px"
                viewBox="100 100 400 400" xml:space="preserve">
                <filter id="dropshadow" height="130%">
                    <feGaussianBlur in="SourceAlpha" stdDeviation="5" />
                    <feOffset dx="0" dy="0" result="offsetblur" />
                    <feFlood flood-color="red" />
                    <feComposite in2="offsetblur" operator="in" />
                    <feMerge>
                        <feMergeNode />
                        <feMergeNode in="SourceGraphic" />
                    </feMerge>
                </filter>
                <path class="path" fill="#000000" d="M446.089,261.45c6.135-41.001-25.084-63.033-67.769-77.735l13.844-55.532l-33.801-8.424l-13.48,54.068
                    c-8.896-2.217-18.015-4.304-27.091-6.371l13.568-54.429l-33.776-8.424l-13.861,55.521c-7.354-1.676-14.575-3.328-21.587-5.073
                    l0.034-0.171l-46.617-11.64l-8.993,36.102c0,0,25.08,5.746,24.549,6.105c13.689,3.42,16.159,12.478,15.75,19.658L208.93,357.23
                    c-1.675,4.158-5.925,10.401-15.494,8.031c0.338,0.485-24.579-6.134-24.579-6.134l-9.631,40.468l36.843,9.188
                    c8.178,2.051,16.209,4.19,24.098,6.217l-13.978,56.17l33.764,8.424l13.852-55.571c9.235,2.499,18.186,4.813,26.948,6.995
                    l-13.802,55.309l33.801,8.424l13.994-56.061c57.648,10.902,100.998,6.502,119.237-45.627c14.705-41.979-0.731-66.193-31.06-81.984
                    C425.008,305.984,441.655,291.455,446.089,261.45z M368.859,369.754c-10.455,41.983-81.128,19.285-104.052,13.589l18.562-74.404
                    C306.28,314.65,379.774,325.975,368.859,369.754z M379.302,260.846c-9.527,38.187-68.358,18.781-87.442,14.023l16.828-67.489
                    C327.767,212.14,389.234,221.02,379.302,260.846z" />
            </svg>
        </div>
    </div>

    <div class="wrapper">

        <header class="header">
            <div class="container">
                <div class="row">
                    <!-- Logo Starts -->
                    <div class="main-logo col-xs-12 col-md-3 col-md-2 col-lg-2 hidden-xs">
                        <a href="{{ url('') }}">
                            <img id="logo" class="img-responsive"
                                src="{{ asset('resources/upload/logos/' . $image_setting->logo) }}"
                                alt="{{ $single_setting['title'] }}">
                        </a>
                    </div>
                    <!-- Logo Ends -->
                    <!-- Statistics Starts -->
                    <div class="col-md-7 col-lg-7">

                    </div>
                    <!-- Statistics Ends -->
                    <!-- User Sign In/Sign Up Starts -->

                    <!-- User Sign In/Sign Up Ends -->
                </div>
            </div>
            <!-- Navigation Menu Starts -->
            <nav class="site-navigation navigation" id="site-navigation">
                <div class="container">
                    <div class="site-nav-inner">
                        <!-- Logo For ONLY Mobile display Starts -->
                        <a class="logo-mobile" href="{{ url('') }}">
                            <img id="logo-mobile" class="img-responsive"
                                src="{{ url('resources/upload/logos/' . $image_setting->logo) }}" alt="">
                        </a>
                        <!-- Logo For ONLY Mobile display Ends -->
                        <!-- Toggle Icon for Mobile Starts -->
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!-- Toggle Icon for Mobile Ends -->
                        <div class="collapse navbar-collapse navbar-responsive-collapse">
                            <!-- Main Menu Starts -->
                            <ul class="nav navbar-nav">
                                <li class="{{ Request::is('/') ? 'active' : '' }}"><a
                                        href="{{ url('') }}">خانه</a></li>

                                <li class="{{ Request::is('news') ? 'active' : '' }}"><a
                                        href="{{ url('news') }}">اخبار</a></li>
                                <li class="{{ Request::is('faq') ? 'active' : '' }}"><a
                                        href="{{ url('faq') }}">سوالات متداول</a></li>
                                @php
                                    $menus = \App\Menu::where('status', 1)
                                        ->orderBy('position', 'asc')
                                        ->get();
                                @endphp
                                @if (sizeof($menus) > 0)
                                    @foreach ($menus as $key => $value)
                                        <li class="{{ Request::is($value->url) ? 'active' : '' }}"><a @if ($value->blink == 1) class="blink_me" @endif
                                                href="{{ url($value->url) }}">{{ $value->title }}</a></li>
                                    @endforeach
                                @endif
                                <li class="{{ Request::is('contact') ? 'active' : '' }}"><a
                                        href="{{ url('contact') }}">تماس با ما</a></li>
                                <li class="search"><button class="fa fa-search"></button></li>


                                <li>
                                    <ul class="unstyled user">
                                        @if (!\Illuminate\Support\Facades\Auth::check())
                                            <li class="sign-in"><a href="{{ url('login') }}"
                                                    class="btn btn-primary"><i class="fa fa-user"></i> ورود</a></li>

                                            <li class="sign-up"><a href="{{ url('register') }}"
                                                    class="btn btn-primary"><i class="fa fa-user-plus"></i> ثبت نام</a>
                                            </li>
                                        @else
                                            <li class="sign-up"><a href="#" class="btn btn-primary"><i
                                                        class="fa fa-dashboard"></i>&nbsp;حساب کاربری شما</a>
                                                <ul class="dropdown-menu" role="menu" style="z-index: 10000;">
                                                    @if (Auth::user()->role == 'admin')
                                                        <li><a href="{{ url('adm-panel/dashboard') }}">پنل مدیریت</a>
                                                        </li>
                                                    @endif
                                                    <li><a href="{{ url('profile/wallet') }}">کیف پول</a></li>
                                                    <li><a href="{{ url('logout') }}">خروج</a></li>
                                                </ul>
                                            </li>

                                        @endif


                                    </ul>
                        </div>



                        <!-- Search Icon Ends -->
                        </ul>
                        <!-- Main Menu Ends -->
                    </div>
                </div>
    </div>
    <!-- Search Input Starts -->
    <div class="site-search">
        <div class="container">
            <form method="get" action="{{ url('news') }}">
                <input type="text" name="q" placeholder="جستجو در اخبار ...">
                <span class="close">×</span>
            </form>
        </div>
    </div>
    <!-- Search Input Ends -->
    </nav>
    <!-- Navigation Menu Ends -->
    </header>

    @yield('slider')
    @yield('content')
    @yield('feature')
    @yield('about')
    @yield('image')
    @yield('user')
    @yield('chart')
    @yield('news')


    <section class="call-action-all"
        style="background: url({{ url('resources/upload/logos/' . $image_setting['footer']) }});">
        <div class="call-action-all-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- Call To Action Text Starts -->
                        <div class="action-text">
                            <h2>{{ $section_five['txt_one'] }}</h2>
                            <p class="lead">{{ $section_five['txt_two'] }}</p>
                        </div>

                        <p class="action-btn"><a class="btn btn-primary"
                                href="{{ url($section_five['connect_five']) }}">{{ $section_five['btn_val'] }}</a>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <!-- Footer Top Area Starts -->
        <div class="top-footer">
            <div class="container">
                <div class="row">
                    <!-- Footer Widget Starts -->
                    <div class="col-sm-4 col-md-3">
                        <h4>{{ $single_setting['title'] }}</h4>
                        <div class="menu">
                            <ul>
                                <li><a href="{{ url('') }}">خانه</a></li>
                                <li><a href="{{ url('news') }}">اخبار</a></li>
                                <li><a href="{{ url('contact') }}">تماس با ما</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-4 col-md-3">
                        <h4>آخرین اخبار</h4>
                        @php
                            $news = \App\News::orderBy('id', 'desc')
                                ->limit(6)
                                ->get();
                        @endphp
                        <div class="menu">
                            <ul>
                                @foreach ($news as $key => $value)
                                    <li><a href="{{ url('news/' . $value->title_url) }}">{{ $value->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-4 col-md-3">
                        <h4>برگه ها</h4>
                        @php
                            $menu = \App\Menu::where('status', 1)
                                ->orderBy('position', 'asc')
                                ->limit(6)
                                ->get();
                        @endphp
                        <div class="menu">
                            <ul>
                                @foreach ($menu as $key => $value)
                                    <li><a href="{{ url($value->url) }}">{{ $value->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-4 col-md-3">
                        <h4>تماس با ما </h4>
                        <div class="contacts">
                            <div>
                                <span>{{ $single_setting['email'] }}</span>
                            </div>
                            <div>
                                <span>{{ $single_setting['phone'] }}</span>
                            </div>
                            <div>
                                <span>{{ $single_setting['address'] }}</span>
                            </div>

                        </div>
                        <!-- Social Media Profiles Starts -->
                        <div class="social-footer">
                            <ul>
                                <li><a href="{{ $single_setting['facebook'] }}" target="_blank"><i
                                            class="fa fa-facebook"></i></a></li>
                                <li><a href="{{ $single_setting['twitter'] }}" target="_blank"><i
                                            class="fa fa-twitter"></i></a></li>
                                <li><a href="{{ $single_setting['instagram'] }}" target="_blank"><i
                                            class="fa fa-instagram"></i></a></li>
                                <li><a href="{{ $single_setting['telegram'] }}" target="_blank"><i
                                            class="fa fa-telegram"></i></a></li>
                            </ul>
                        </div>
                        <!-- Social Media Profiles Ends -->
                    </div>

                </div>
            </div>
        </div>
        <!-- Footer Top Area Ends -->
        <!-- Footer Bottom Area Starts -->
        <div class="bottom-footer">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- Copyright Text Starts -->
                        <p class="text-center">{{ $single_setting['copyright'] }}</p>
                        <!-- Copyright Text Ends -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom Area Ends -->
    </footer>

    <a href="#" id="back-to-top" class="back-to-top fa fa-arrow-up show-back-to-top"></a>


    </div>


    <script src="{{ asset('resources/js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('resources/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('resources/js/select2.min.js') }}"></script>
    <script src="{{ asset('resources/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('resources/js/custom.js') }}"></script>



</body>

</html>
