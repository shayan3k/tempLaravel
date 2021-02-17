@extends('layouts.admin')
<?php
$jdf = new \App\lib\Jdf();
?>
@section('content')

<div class="row-fluid">
            <div class="span12">

                <h3 class="page-title">
                   پنل مدیریت وب سایت
                            <small>ویرایش منو</small>
                </h3>
                <ul class="breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="{{ url('adm-panel/dashboard') }}">پیشخوان</a>
                        <i class="fa fa-angle-left"></i>
                    </li>

                    <li><a href="{{ Request::url() }}">ویرایش منو</a></li>

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

<div class="row-fluid">
            <div class="span12">
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption"><i class="fa fa-comment"></i>ویرایش منو</div>
                    </div>
                    <div class="portlet-body form">
 {!! Form::model($row,['method'=>'PUT','url'=>['adm-panel/menu',$row['id']],'class'=>'form-horizontal']) !!}

@if($errors->has('title')) <div class="submit-error" style="display: block">{{ $errors->first('title') }}</div> @endif
@if($errors->has('link')) <div class="submit-error" style="display: block">{{ $errors->first('link') }}</div> @endif
@if($errors->has('page_id')) <div class="submit-error" style="display: block">{{ $errors->first('page_id') }}</div> @endif

                            <div class="control-group" id="userNameGroup">
                                <label for="frm_name" class="control-label size-13">عنوان منو <span  class="required ltr"> * </span></label>
                                <div class="controls">
                                    <div class="input-icon left">
                                        <i class="fa fa-user"></i>
                                        <input class="m-wrap required rtl" name="title" id="frm_name" value="{{ $row->title }}" type="text">

                                    </div>
                                </div>
                            </div>


                            <div class="control-group">
                                <label for="frm_menuType" class="control-label size-13">نوع منو</label>
                                <div class="controls">
                                    <select class="m-wrap medium" name="type_menu" id="frm_menuType">
                                        <option @if($row->type_menu==1) selected @endif value="1"> محتوای منو</option>
                                        <option @if($row->type_menu==2) selected @endif value="2"> لینک خارجی</option>
                                    </select>
                                </div>
                            </div>

                            <div id="2-group" class="toggle hide" style="@if($row->type_menu==2)display: block;@else display: none; @endif">
                                <div class="control-group">
                                    <label for="frm_link" class="control-label size-13"> آدرس URL لینک <span  class="required ltr"> * </span></label>
                                    <div class="controls">
                                        <div class="input-icon left">
                                            <i class="icon-lock"></i>
                                            <input class="m-wrap ltr" type="text" value="{{ $row->link }}" name="link" id="frm_link">

                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div id="1-group" class="toggle" style="@if($row->type_menu==1)display: block;@else display: none; @endif">
                                <div class="control-group">
                                    <label for="frm_page" class="control-label size-13">انتخاب منو<span  class="required ltr"> * </span></label>
                                    <div class="controls">
                                 {!! form::select('page_id',$pages,null,['class'=>'m-wrap medium size-13','id'=>'frm_page'])  !!}

                                    </div>
                                </div>
                            </div>
                        <div class="control-group">
                            <label for="frm_menuType" class="control-label size-13">چشمک زن</label>
                            <div class="controls">
                                {!! Form::checkbox('blink',1) !!}

                            </div>
                        </div>

                            <div class="form-actions">
                                <button type="submit" class="btn green">ویرایش</button>
                            </div>

                        {{ Form::close() }}
                    </div>
                </div>
            </div>

        </div>

            @endsection

            @section('footer')
<script>
  $("#frm_menuType").change(function () {
        $(".toggle").hide();
        type = $(this).val();
        $("#" + type + "-group").show();
    });

</script>
            @endsection
