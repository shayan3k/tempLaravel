@extends('layouts.admin')
<?php
$jdf = new \App\lib\Jdf();
?>
@section('content')

<div class="row-fluid">
            <div class="span12">

                <h3 class="page-title">
                   پنل مدیریت وب سایت
                              <small>ویرایش سوالات متداول</small>
                </h3>
                <ul class="breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="{{ url('adm-panel/dashboard') }}">پیشخوان</a>
                        <i class="fa fa-angle-left"></i>
                    </li>
                    <li>
                        <a href="{{ url('adm-panel/question') }}">مدیریت سوالات</a>

                    </li>


        <li class="pull-left no-text-shadow hidden-phone">
            <div id="dashboard-calender">
                <i class="fa fa-calendar" style="color:white"></i>
امروز  {{ $jdf->jdate("l j  F  Y") }}
            </div>
        </li>
                    </ul>
            </div>
        </div>

<!-- -->



<div class="container-fluid">

     {!! Form::open(['url'=>'adm-panel/question']) !!}

<div class="row-fluid">

    <div class="span7">
        <div class="portlet box light">
            <div class="portlet-body form">


     <div class="row-fluid">

    <label for="cat_name">عنوان <span class="required ltr"> * </span></label>
    <div class="form-group">
        <input type="text" id="title" class="form-control m-wrap span12" name="title" autocomplete="off">
    </div>
    @if($errors->has('title'))<div class="help-block error">{{ $errors->first('title') }}</div>@endif
    </div>

   <div class="row-fluid">

    <label for="cat_name">توضیحات <span class="required ltr"> * </span></label>
    <div class="form-group">
     <textarea class="span12 m-wrap rtl size-13" id="SEO_DESCRIPTION" name="desc" rows="6"></textarea>

    </div>
    @if($errors->has('desc'))<div class="help-block error">{{ $errors->first('desc') }}</div>@endif
    </div>




                           </div>
                        </div>
                    </div>





                </div>

                <div class="form-actions" id="add_etate_submit">
                    <button type="submit" class="btn green" id="submit_item"> <i class="fa fa-check"></i> ثبت</button>
                </div>

           {{ Form::close() }}

        </div>

































@endsection

@section('header')
@endsection

@section('footer')




@endsection
