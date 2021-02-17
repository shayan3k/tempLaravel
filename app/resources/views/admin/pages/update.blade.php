@extends('layouts.admin')
<?php
$jdf = new \App\lib\Jdf();
?>
@section('content')

<div class="row-fluid">
            <div class="span12">

                <h3 class="page-title">
                   پنل مدیریت وب سایت
                            <small>ویرایش برگه</small>
                </h3>
                <ul class="breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="{{ url('adm-panel/dashboard') }}">پیشخوان</a>
                        <i class="fa fa-angle-left"></i>
                    </li>

                    <li><a href="{{ Request::url() }}">ویرایش برگه</a></li>

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
                            <div class="caption"><i class="fa fa-comment"></i>ویرایش برگه</div>
                        </div>
                        <div class="portlet-body form">
 {!! Form::model($row,['method'=>'PUT','url'=>['adm-panel/pages',$row['id']],'class'=>'form-horizontal']) !!}


                                <div class="control-group" id="userNameGroup">
                                    <label class="control-label size-13" for="frm_title">عنوان برگه<span  class="required ltr"> * </span></label>
                                    <div class="controls">
                                        <div class="input-icon left">
                                            <i class="fa fa-user"></i>
                                            <input class="m-wrap required rtl" name="title" id="frm_title" type="text" value="{{ $row->title }}">
                                            <span class="help-block form-alert">عنوان برگه می تواند فارسی و یا لاتین باشد </span>
                                           @if($errors->has('title')) <span class="help-block form-alert error">{{ $errors->first('title') }}</span> @endif
                                        </div>
                                    </div>
                                </div>



                                <div class="next-line"> </div>


                                <div class="control-group">
                                    <label class="control-label size-13" for="frm_content"> محتوای برگه </label>
                                    <div class="controls">
                                        <textarea class="span12 ckeditor m-wrap rtl" name="content" id="editor" rows="6" >{{ $row->content }}</textarea>
                                    </div>
                                </div>


                                <div class="form-actions">
                                    <input type="hidden" name="action" value="add">

                                    <button type="submit" class="btn green" id="userAdd_submit">ویرایش</button>
                                </div>

                           {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>

            @endsection

            @section('footer')
              <script type="text/javascript" src="{{ url('resources/ckeditor/ckeditor.js') }}"></script>
              <script>
                  CKEDITOR.replace( 'editor', {
                      filebrowserUploadUrl: "{{ url('adm-panel/ajax/upload') }}"
                  } );
              </script>
            @endsection
