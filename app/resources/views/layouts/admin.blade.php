<!DOCTYPE html>
<html lang="fa">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>پنل مدیریت </title>
    <link rel="shortcut icon" type="image/x-icon" href="#">

    <link href="{{ asset('resources/css/theme/bootstrap-rtl.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('resources/css/theme/bootstrap-responsive-rtl.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('resources/css/font-awesome.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('resources/css/theme/style-metro-rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('resources/css/theme/style-rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('resources/css/theme/style-responsive-rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('resources/css/theme/default-rtl.css') }}" rel="stylesheet" type="text/css"
        id="style_color" />
    <link href="{{ asset('resources/css/theme/jquery.easy-pie-chart.css') }}" rel="stylesheet" type="text/css"
        media="screen" />

    @yield('header')

    <link href="{{ asset('resources/css/theme/custom-rtl.css') }}" rel="stylesheet" type="text/css" media="screen" />


<body class="page-header-fixed">
    <img src="{{ asset('resources/images/loader.gif') }}" id="state-loading" width="300" style="display:none">


    <div class="header navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container-fluid">


                <a href="#" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
                    <img src="{{ asset('resources/images/menu-toggler.png') }}" alt="">
                </a>

                <ul class="nav pull-left">
                    <li class="dropdown user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                            data-close-others="true">
                            <span class="username size-13">خوش آمدید
                                {{ \Illuminate\Support\Facades\Auth::user()->fname . ' ' . \Illuminate\Support\Facades\Auth::user()->lname }}</span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('adm-panel/profile') }}"><i class="fa fa-user"></i>حساب کاربری من</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="javascript:;" id="trigger_fullscreen"><i class="fa fa-arrows"></i> تمام صفحه
                                </a></li>
                            <li><a href="{{ url('logout') }}"><i class="fa fa-key"></i> خروج </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="page-container">


        <div class="page-sidebar nav-collapse collapse">
            <ul class="page-sidebar-menu">
                <li>
                    <div class="sidebar-toggler hidden-phone"></div>
                </li>
                <li> &nbsp; </li>

                <li id="menu-item-9" class="{{ Request::is('adm-panel/dashboard') ? 'active' : '' }}">
                    <a href="{{ url('adm-panel/dashboard') }}" target="_self">
                        <i class="fa fa-dashboard"></i>
                        <span class="title">پیشخوان</span>
                    </a>
                </li>
                <li class="{{ Request::is('adm-panel/coin*') ? 'active' : '' }}">
                    <a href="javascript:;">
                        <i class="fa fa-dollar"></i>
                        <span class="title">ارز دیجیتال</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        @can('view-coin')
                            <li id="menu-item-14">
                                <a href="{{ url('adm-panel/coin') }}" target="_self">مدیریت ارز</a>
                            </li>
                        @endcan

                        @can('add-coin')
                            <li>
                                <a href="{{ url('adm-panel/coin/create') }}" target="_self">افزودن ارز جدید</a>
                            </li>
                        @endcan

                    </ul>
                </li>
                <li class="{{ Request::is('adm-panel/users*') ? 'active' : '' }}">
                    <a href="javascript:;">
                        <i class="fa fa-users"></i>
                        <span class="title">کاربران</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        @can('view-users')
                            <li id="menu-item-14">
                                <a href="{{ url('adm-panel/users') }}" target="_self">مدیریت کاربران</a>
                            </li>
                        @endcan

                        @can('add-users')
                            <li>
                                <a href="{{ url('adm-panel/users/create') }}" target="_self">افزودن کاربر جدید</a>
                            </li>
                        @endcan

                    </ul>
                </li>


                <li id="menu-item-20" class="{{ Request::is('adm-panel/slider*') ? 'active' : '' }}">
                    <a href="javascript:;">
                        <i class="fa fa-picture-o"></i>
                        <span class="title"> اسلایدر</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">

                        @can('view-slider')
                            <li id="menu-item-21">
                                <a href="{{ url('adm-panel/slider') }}" target="_self">مدیریت اسلایدر ها</a>
                            </li>
                        @endcan


                        @can('add-slider')
                            <li id="menu-item-71">
                                <a href="{{ url('adm-panel/slider/create') }}" target="_self">افزودن اسلایدر</a>
                            </li>
                        @endcan



                    </ul>
                </li>

                <li id="menu-item-20" class="{{ Request::is('adm-panel/news*') ? 'active' : '' }}">
                    <a href="javascript:;">
                        <i class="fa fa-newspaper-o"></i>
                        <span class="title">اخبار </span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">

                        @can('view-news')
                            <li id="menu-item-21">
                                <a href="{{ url('adm-panel/news') }}" target="_self">مدیریت خبر ها</a>
                            </li>
                        @endcan
                        @can('add-news')
                            <li id="menu-item-71">
                                <a href="{{ url('adm-panel/news/create') }}" target="_self">افزودن</a>
                            </li>
                        @endcan




                    </ul>
                </li>




                <li id="menu-item-20" class="{{ Request::is('adm-panel/services*') ? 'active' : '' }}">
                    <a href="javascript:;">
                        <i class="fa fa-dropbox"></i>
                        <span class="title">خدمات </span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        @can('view-services')

                            <li id="menu-item-21">
                                <a href="{{ url('adm-panel/services') }}" target="_self">مدیریت خدمات </a>
                            </li>
                        @endcan
                        @can('add-services')
                            <li id="menu-item-71">
                                <a href="{{ url('adm-panel/services/create') }}" target="_self">افزودن</a>
                            </li>
                        @endcan




                    </ul>
                </li>



                <li id="menu-item-35"
                    class="{{ Request::is('adm-panel/menu*') ? 'active' : '' }} {{ Request::is('adm-panel/pages*') ? 'active' : '' }}">
                    <a href="javascript:;">
                        <i class="fa fa-th"></i>
                        <span class="title">منو و برگه های سایت</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        @can('view-menu')
                            <li id="menu-item-37">
                                <a href="{{ url('adm-panel/menu') }}" target="_self">مدیریت منوها</a>
                            </li>

                            <li id="menu-item-38">
                                <a href="{{ url('adm-panel/menu/sort/list') }}" target="_self">اولویت بندی منوها</a>
                            </li>

                            <li id="menu-item-49">
                                <a href="{{ url('adm-panel/pages') }}" target="_self">مدیریت برگه ها</a>
                            </li>
                        @endcan
                    </ul>
                </li>


                @can('view-q')
                    <li id="menu-item-42" class="{{ Request::is('adm-panel/question*') ? 'active' : '' }}">
                        <a href="{{ url('adm-panel/question') }}" target="_self">
                            <i class="fa fa-question"></i>
                            <span class="title">سوالات متداول</span>
                        </a>
                    </li>
                @endcan
                @can('view-static')
                    <li id="menu-item-46" class="{{ Request::is('adm-panel/statistics*') ? 'active' : '' }}">
                        <a href="{{ url('adm-panel/statistics') }}" target="_self">
                            <i class="fa fa-area-chart"></i>
                            <span class="title">آمارهای سایت</span>
                        </a>
                    </li>
                @endcan

                @can('view-setting')
                    <li id="menu-item-39" class="{{ Request::is('adm-panel/settings*') ? 'active' : '' }}">
                        <a href="{{ url('adm-panel/settings/main') }}" target="_self">
                            <i class="fa fa-cog"></i>
                            <span class="title">تنظیمات سایت</span>
                        </a>
                    </li>
                @endcan
                <li>
                    <a href="{{ url('') }}" target="_blank">
                        <i class="fa fa-globe"></i>
                        <span class="title"> مشاهده سایت </span>
                    </a>
                </li>
            </ul>
        </div>



        <div class="page-content">

            <div class="container-fluid">
                @yield('content')
            </div>

        </div>
























    </div>



    <div class="footer">
        <div class="footer-inner ltr">
            تمامی حقوق محفوظ می باشد </div>
        <div class="footer-tools">
            <span class="go-top">
                <i class="fa fa-angle-up"></i>
            </span>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('resources/js/theme/jquery-1.10.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('resources/js/theme/jquery-migrate-1.2.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('resources/js/theme/bootstrap-rtl.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('resources/js/theme/jquery.blockui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('resources/js/theme/jquery.cookie.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('resources/js/theme/jquery.uniform.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('resources/js/theme/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('resources/js/theme/index.js') }}"></script>
    <script type="text/javascript" src="{{ asset('resources/js/theme/jquery.flot.js') }}"></script>
    <script type="text/javascript" src="{{ asset('resources/js/theme/jquery.flot.categories.js') }}"></script>
    <script type="text/javascript" src="{{ asset('resources/js/theme/jquery.easy-pie-chart.js') }}"></script>



    <script>
        jQuery(document).ready(function() {
            App.init();
        });

    </script>
    @yield('footer')
</body>


</html>
