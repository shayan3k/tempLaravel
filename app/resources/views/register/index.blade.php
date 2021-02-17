<?php
$main_setting = \App\MainSetting::first();
$single_setting = \App\SingleSetting::first();
$image_setting = \App\ImagesSetting::first();
$section_five =  \App\SectionFiveSetting::first();
$class = '';
?>

    <!DOCTYPE html>
<html lang="fa">

<head>

    <meta charset="utf-8" />
    <title>{{ $single_setting['title'] }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


    <link rel="shortcut icon" href="{{ url('resources/upload/logos/'.$image_setting['favicon']) }}">


    <link rel="stylesheet" href="{{ url('resources/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ url('resources/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('resources/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ url('resources/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ url('resources/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('resources/css/skins/orange.css') }}">

    <link rel="alternate stylesheet" type="text/css" title="orange" href="{{ url('resources/css/skins/orange.css') }}"/>
    <script src="{{ url('resources/js/modernizr.js') }}"></script>

</head>

<body class="{{ $class }}">

<div id="preloader">
    <div id="preloader-content">
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="150px" height="150px" viewBox="100 100 400 400" xml:space="preserve">
                <filter id="dropshadow" height="130%">
                    <feGaussianBlur in="SourceAlpha" stdDeviation="5"/>
                    <feOffset dx="0" dy="0" result="offsetblur"/>
                    <feFlood flood-color="red"/>
                    <feComposite in2="offsetblur" operator="in"/>
                    <feMerge>
                        <feMergeNode/>
                        <feMergeNode in="SourceGraphic"/>
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
                    C327.767,212.14,389.234,221.02,379.302,260.846z"/>
            </svg>
    </div>
</div>

<div class="wrapper">

    <div class="container-fluid user-auth">
        <div class="hidden-xs col-sm-8 col-md-4 col-lg-2">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
            <!-- Logo Starts -->
            <a class="visible-xs" href="{{ url('') }}">
                <img id="logo" class="img-responsive mobile-logo" src="{{ url('resources/upload/logos/'.$image_setting['logo']) }}" alt="{{ $single_setting['title'] }}">
            </a>
            <!-- Logo Ends -->
            @if(\Illuminate\Support\Facades\Session::has('login_number'))
                <div class="form-container">
                    <div>
                        <!-- Section Title Starts -->
                        <div class="row text-center">
                            <h2 class="title-head hidden-xs">تایید <span>حساب کاربری</span></h2>
                            <p class="info-form">لطفا کد تایید ورود به حساب کاربری خود را وارد نمایید</p>
                        </div>

                        {!! Form::open(['url'=>'verify']) !!}
                        @if(\Illuminate\Support\Facades\Session::has('errors'))
                            <div class="alert alert-danger" role="alert">
                                کد وارد شده جهت تایید حساب کاربری صحیح نمی باشد
                            </div>
                        @endif
                        <div class="form-group">
                            <input class="form-control" name="active" id="active" placeholder="کد تایید" type="text" required>
                            @if($errors->has('active'))<div class="error">{{ $errors->first('active') }}</div> @endif
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">تایید حساب کاربری</button>
                            <p class="text-center">قبلاً ثبت نام کردید؟ <a href="{{ url('login') }}">ورود به سیستم</a>
                        </div>
                        <!-- Submit Form Button Ends -->
                    {{ Form::close() }}
                        <!-- Form Ends -->
                    </div>
                </div>
            @else
                <div class="form-container">
                    <div>
                        <!-- Section Title Starts -->
                        <div class="row text-center">
                            <h2 class="title-head hidden-xs">ثبت نام <span>کنید</span></h2>
                            <p class="info-form">حساب را به صورت رایگان باز کنید</p>
                        </div>

                        {!! Form::open(['url'=>'register']) !!}
                        
                        
                     
                        <div class="form-group">
                            <input class="form-control" name="fname" id="fname" placeholder="نام" type="text" required>
                            @if($errors->has('fname'))   <div class="error">{{ $errors->first('fname') }}</div> @endif

                        </div>

                        <div class="form-group">
                            <input class="form-control" name="lname" id="lname" placeholder="نام خانوادگی" type="text" required>
                            @if($errors->has('lname'))   <div class="error">{{ $errors->first('lname') }}</div> @endif

                        </div>
                        <div class="form-group">
                            <input class="form-control" maxlength="11" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="username" id="username" placeholder="شماره همراه" type="text" required>
                            @if($errors->has('username'))   <div class="error">{{ $errors->first('username') }}</div> @endif
                        </div>

                        <div class="form-group">
                            <input class="form-control" name="password" id="password" placeholder="کلمه عبور" type="password" required>
                            @if($errors->has('password'))   <div class="error">{{ $errors->first('password') }}</div> @endif

                        </div>

                        <div class="form-group">
                            <small>اینجانب <a href="#"  data-toggle="modal" data-target="#exampleModalLong">توافق نامه</a> را مطالعه و تمامی متون آن را می پذیرم. </small><input type="checkbox" name="verify">


                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">ایجاد حساب کاربری</button>
                            <p class="text-center">قبلاً ثبت نام کردید؟ <a href="{{ url('login') }}">ورود به سیستم</a>
                        </div>

                    {{ Form::close() }}

                    </div>
                </div>

             @endif
            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">توافق نامه</h5>
                        </div>
                        <div class="modal-body">
                            {!! $single_setting['terms'] !!}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Copyright Text Starts -->
            <p class="text-center copyright-text">{{ $single_setting['copyright'] }}</p>
            <!-- Copyright Text Ends -->
        </div>
    </div>

</div>


<script src="{{ url('resources/js/jquery-2.2.4.min.js') }}"></script>
<script src="{{ url('resources/js/bootstrap.min.js') }}"></script>
<script src="{{ url('resources/js/select2.min.js') }}"></script>
<script src="{{ url('resources/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ url('resources/js/custom.js') }}"></script>



</body>

</html>