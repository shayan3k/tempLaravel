@extends('layouts.admin')
<?php
$jdf = new \App\lib\Jdf();
?>
@section('content')

<div class="row-fluid">
            <div class="span12">

                <h3 class="page-title">
                   پنل مدیریت وب سایت
                            <small>ثبت خدمت</small>
                </h3>
                <ul class="breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="{{ url('adm-panel/dashboard') }}">پیشخوان</a>
                        <i class="fa fa-angle-left"></i>
                    </li>
                    <li>
                        <a href="{{ url('adm-panel/services') }}">مدیریت خدمات</a>

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

				{!! Form::open(['url'=>'adm-panel/services','files'=>true]) !!}
						<div class="row-fluid">

							<div class="span7">
								<div class="portlet box light">
									<div class="portlet-body form">

                            <div class="row-fluid">
                                <label for="title">عنوان خدمت <span class="required ltr"> * </span></label>
                                <div class="form-group">
                                    <input type="text" autocomplete="off" class="form-control m-wrap span12" name="title" id="title" value="{{ old('title') }}">
                                </div>
                               @if($errors->has('title')) <div class="help-block error">{{ $errors->first('title')}}</div> @endif
                            </div>

                                        <div class="row-fluid">


                                            <label for="frm_description">توضیح مختصر</label>
                                            <div class="form-group">
                                                <textarea class="span12 m-wrap rtl size-13" style="resize: none"  name="desc_low" rows="2">{{ old('desc_low') }}</textarea>
                                            </div>

                                        </div>


                                <div class="row-fluid">


                                        <label for="frm_description">توضیحات</label>
                                        <div class="form-group">
                                            <textarea class="span12 m-wrap rtl size-13" style="resize: none"  name="desc_high" rows="3">{{ old('desc_high') }}</textarea>
                                        </div>

                                </div>


                                    </div>
								</div>

                            </div>


                            <div class="span5">
                                <div class="portlet box light">
                                    <div class="portlet-body form">

                                        <div class="row-fluid">

                                            <div class="d_i">
                                                <label for="icon">انتخاب تصویر خدمت</label>
                                            </div>


                                            <div class="form-group">
                                                <input type="file" name="img" style="display: none" id="img_file" onchange="load_file(event)">

                                                <img style="margin: 0 auto;display: block;cursor: pointer;" src="{{ url('resources/images/camera.jpg') }}" id="out_img" onclick="select_file()" />
                                            </div>
                                            <div style="text-align: center;padding-top: 10px" class="help-block">لطفا یک تصویر مناسب برای خدمت مورد نظر انتخاب فرمایید.</div>
                                            <br>
                                            @if($errors->has('img'))<div class="help-block error">{{ $errors->first('img') }}</div>@endif
                                        </div>



                                    </div>
                                </div>


                                <div class="portlet box light">
                                    <div class="portlet-body form">
                                        <div class="controls">
                                            <label for="product_status">
                                                {!! Form::checkbox('status',1) !!}

                                                وضعیت نمایش در صفحه نخست
                                            </label>
                                            <div class="help-block" style="padding-right: 7px">
                                                با انتخاب این گزینه خدمت مورد نظر در صفحه اول نمایش می گردد.
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>



						</div>

						<div class="form-actions" id="add_etate_submit">
						    <button type="submit" class="btn green" > <i class="fa fa-check"></i> ثبت خدمت </button>
						</div>
				{{ Form::close() }}

				</div>






@endsection

@section('header')
<link href="{{ url('resources/css/theme/uniform.default.css') }}" rel="stylesheet" type="text/css" media="screen"/>

@endsection

@section('footer')

 <script>


     select_file = function()
     {
         $('#img_file').click();

     };

     load_file = function(event) {
         var render = new FileReader;
         render.onload= function() {
             var output = document.getElementById('out_img');
             output.src = render.result;
         };
         render.readAsDataURL(event.target.files[0]);
     }



 </script>

@endsection
