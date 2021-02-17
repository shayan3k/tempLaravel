@extends('layouts.admin')
<?php
$jdf = new \App\lib\Jdf();
?>
@section('content')

<div class="row-fluid">
            <div class="span12">

                <h3 class="page-title">
                   پنل مدیریت وب سایت
                            <small> ثبت کاربر جدید </small>
                </h3>
                <ul class="breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="{{ url('adm-panel/dashboard') }}">پیشخوان</a>
                        <i class="fa fa-angle-left"></i>
                    </li>
                    <li>
                        <a href="{{ url('adm-panel/users') }}">مدیریت کاربرها</a>

                    </li>

        <li class="pull-left no-text-shadow hidden-phone">
            <div id="dashboard-calender">
                <i class="fa fa-calendar" style="color:white"></i>
امروز  {{ $jdf->jdate("l j   F  Y") }}
            </div>
        </li>
                    </ul>
            </div>
        </div>

<!-- -->






<div class="container-fluid">

    {!! Form::model($row,['method'=>'PUT','files'=>true,'url'=>['adm-panel/users',$row['id']]]) !!}
                        <div class="row-fluid">

                            <div class="span7">

                                <div class="portlet box light">
                                    <div class="portlet-body form">
                                        <div class="row-fluid">
    <label for="register_param">شماره همراه <span class="required ltr"> * </span></label>
    <div class="form-group">
        <input type="text"  required oninput="this.value=this.value.replace(/[^0-9]/g,'');" maxlength="11" class="form-control m-wrap span12 ltr" name="username" id="register_param" value="{{ $row->username }}">
    </div>
   @if($errors->has('username')) <div class="help-block error">{{ $errors->first('username') }}</div> @endif
</div>
<div id="pass">
<div class="row-fluid">
    <label for="password">رمز عبور </label>
    <div class="form-group">
        <input type="password" class="form-control m-wrap span12 ltr" name="password" id="password">
    </div>
   <div class="help-block">در صورت عدم تغییر رمز، فیلد را خالی بگذارید</div>
</div>


</div>

<div class="row-fluid">
    <label for="fname">نام <span class="required ltr"> * </span> </label>
    <div class="form-group">
        <input type="text" required class="form-control m-wrap span12" name="fname" id="fname" value="{{ $row->fname }}">
    </div>
    @if($errors->has('fname')) <div class="help-block error">{{ $errors->first('fname') }}</div> @endif
</div>

    <div class="row-fluid">
        <label for="lname">نام خانوادگی <span class="required ltr"> * </span></label>
        <div class="form-group">
            <input type="text" required class="form-control m-wrap span12" name="lname" id="lname" value="{{ $row->lname }}">
        </div>
      @if($errors->has('lname')) <div class="help-block error">{{ $errors->first('lname') }}</div> @endif
    </div>


    </div>
                                </div>

                            </div>


                            <div class="span5">

                                <div class="portlet box light">
    <div class="portlet-body form">

        <div>
            <label for="access_level">سطح دسترسی</label>
            <div class="controls">
                <select class="m-wrap span12" name="role" id="access_level">
                    <option @if($row->role=="admin") selected @endif value="admin">مدیر ارشد</option>
                    <option @if($row->role=="user") selected @endif value="user" >کاربر عادی</option>
                                    </select>
            </div>
        </div>




    </div>
</div>


                                <div class="portlet box light">
                                    <div class="portlet-body form">
                                        <div class="controls">
                                            <label for="product_status">
                                                {!! Form::checkbox('status',1) !!}
                                                وضعیت حساب کاربری
                                            </label>
                                            <div class="help-block" style="padding-right: 7px">
                                                با انتخاب این گزینه فعال یا غیر فعال بودن کاربر مورد نظر مشخص می گردد.
                                            </div>
                                        </div>
                                    </div>
                                </div>




                            </div>

                        </div>

                        <div class="form-actions" id="add_etate_submit">
                            <button type="submit" class="btn green"  id="submit_item"> <i class="fa fa-check"></i> ویرایش </button>
                        </div>

                 {{ Form::close() }}

                </div>







@endsection

@section('header')
    <link href="{{ url('resources/css/theme/uniform.default.css') }}" rel="stylesheet" type="text/css" media="screen"/>

@endsection

@section('footer')

@endsection
