<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>پنل مدیریت </title>
	<link href="{{ url('resources/css/theme/bootstrap-rtl.min.css') }}" rel="stylesheet" type="text/css"/>
	<link href="{{ url('resources/css/theme/bootstrap-responsive-rtl.min.css') }}" rel="stylesheet" type="text/css"/>
	<link href="{{ url('resources/css/font-awesome.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ url('resources/css/theme/style-metro-rtl.css') }}" rel="stylesheet" type="text/css"/>
	<link href="{{ url('resources/css/theme/style-rtl.css') }}" rel="stylesheet" type="text/css"/>
	<link href="{{ url('resources/css/theme/style-responsive-rtl.css') }}" rel="stylesheet" type="text/css"/>
	<link href="{{ url('resources/css/theme/default-rtl.css') }}" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="{{ url('resources/css/theme/jquery.easy-pie-chart.css') }}" rel="stylesheet" type="text/css" media="screen"/>
    <link href="{{ url('resources/css/theme/login-rtl.css') }}" rel="stylesheet" type="text/css" media="screen"/>
	<link href="{{ url('resources/css/theme/custom-rtl.css') }}" rel="stylesheet" type="text/css" media="screen"/>
	<link href="{{ url('resources/css/theme/uniform.default.css') }}" rel="stylesheet" type="text/css" media="screen"/>

    @yield('header')



<body class="login">


<div class="logo">
    <img src="{{ url('resources/images/logo-dark.png') }}" alt=""/>
</div>

<div class="content">
    <!-- BEGIN LOGIN FORM -->
     {!! Form::open(['url'=>'login','class'=>'form-vertical login-form']) !!}

        <h3 class="form-title size-18">ورود به بخش مدیریت سایت</h3>

            <div class="control-group">

                <label class="control-label visible-ie8 visible-ie9" for="username">نام کاربری</label>
                <div class="controls">
                    <div class="input-icon left">
                        <i class="fa fa-user"></i>
                        <input class="m-wrap placeholder-no-fix"  type="text" autocomplete="off" placeholder="نام کاربری" name="username" id="username"/>

                    </div>
                    @if($errors->has('username'))<p style="color:red">{{ $errors->first('username') }}</p>@endif
                </div>
            </div>
            <div class="control-group">
                <label class="control-label visible-ie8 visible-ie9" for="password">رمز عبور</label>
                <div class="controls">
                    <div class="input-icon left">
                        <i class="fa fa-lock"></i>
                        <input class="m-wrap placeholder-no-fix" type="password" autocomplete="off" placeholder="رمز عبور" name="password" id="password"/>
                    </div>
                    @if($errors->has('password'))<p style="color:red">{{ $errors->first('password') }}</p>@endif

                </div>
            </div>

            <div class="mini-next-line"></div>

            <div class="form-actions">
                <label class="checkbox size-13"><input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} value="{{ old('remember') ? '1' : '0' }}" id="remember" value="1"/> مرا به خاطر بسپار</label>
                <button type="submit" class="btn green pull-left YEKAN size-13">ورود <i class="fa fa-arrow-left m-icon-white"></i></button>
            </div>

         {{ Form::close() }}

<div class="copyright ltr">
    
    </div>

</div>



	<script type="text/javascript" src="{{ url('resources/js/theme/jquery-1.10.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('resources/js/theme/jquery-migrate-1.2.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('resources/js/theme/bootstrap-rtl.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('resources/js/theme/jquery.blockui.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('resources/js/theme/jquery.cookie.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('resources/js/theme/jquery.uniform.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('resources/js/theme/app.js') }}"></script>
    <script type="text/javascript" src="{{ url('resources/js/theme/index.js') }}"></script>
    <script type="text/javascript" src="{{ url('resources/js/theme/jquery.flot.js') }}"></script>
    <script type="text/javascript" src="{{ url('resources/js/theme/jquery.flot.categories.js') }}"></script>
    <script type="text/javascript" src="{{ url('resources/js/theme/jquery.easy-pie-chart.js') }}"></script>

    @yield('footer')

<script>
jQuery(document).ready(function() {
		    App.init();

		});
</script>


</body>


</html>


