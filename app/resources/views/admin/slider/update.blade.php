@extends('layouts.admin')
<?php
$jdf = new \App\lib\Jdf();
?>
@section('content')

<div class="row-fluid">
            <div class="span12">

                <h3 class="page-title">
                   پنل مدیریت وب سایت
                            <small>ویرایش اسلایدر</small>
                </h3>
                <ul class="breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="{{ url('adm-panel/dashboard') }}">پیشخوان</a>
                        <i class="fa fa-angle-left"></i>
                    </li>
                    <li>
                        <a href="{{ url('adm-panel/slider') }}">مدیریت اسلایدر ها</a>

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

    {!! Form::model($row,['method'=>'PUT','files'=>true,'url'=>['adm-panel/slider',$row['id']]]) !!}

<div class="row-fluid">

    <div class="span7">
        <div class="portlet box light">
            <div class="portlet-body form">


     <div class="row-fluid">

    <label for="cat_name">عنوان اسلایدر</label>
    <div class="form-group">
        <input type="text" id="title" value="{{ $row['title'] }}"  class="form-control m-wrap span12" name="title" autocomplete="off">
    </div>
    @if($errors->has('title'))<div class="help-block error">{{ $errors->first('title') }}</div>@endif
    </div>

<div class="row-fluid">
	<div class="control-group">
        <label for="desc" class="control-label size-13">توضیحات اسلاید</label>
        <div class="controls">
            <textarea class="span12 ckeditor m-wrap rtl size-13" id="desc" name="desc">{{ $row->desc }}</textarea>
        </div>
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
         <label for="icon">انتخاب تصویر اسلایدر</label>
        </div>
            <div class="form-group  @if($row->img!=null) next-line @endif">
            <input type="file" name="img" style="display: none" id="img_file" onchange="load_file(event)">
                      <img style="margin: 0 auto;display: block;cursor: pointer;" src="{{ url('resources/upload/slider/'.$row['img']) }}" id="out_img" onclick="select_file()" />
                              </div>
            <div style="text-align: center;padding-top: 10px" class="help-block">لطفا یک تصویر مناسب برای اسلاید مورد نظر انتخاب فرمایید.</div>
            <br>
             @if($errors->has('img'))<div class="help-block error">{{ $errors->first('img') }}</div>@endif
        </div>



    </div>
</div>






                    </div>



                </div>

                <div class="form-actions" id="add_etate_submit">
                    <button type="submit" class="btn green" id="submit_item"> <i class="fa fa-check"></i> ویرایش</button>
                </div>

           {{ Form::close() }}

        </div>

































@endsection

@section('header')

@endsection

@section('footer')
    <script type="text/javascript" src="{{ url('resources/ckeditor/ckeditor.js') }}"></script>

    <script src="{{ url('resources/js/theme/sweetalert.min.js') }}" type="text/javascript"></script>
 @include('sweet::alert')


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
