@extends('layouts.admin')
<?php
$jdf = new \App\lib\Jdf();
?>
@section('content')

<div class="row-fluid">
            <div class="span12">

                <h3 class="page-title">
                   پنل مدیریت وب سایت
                          <small>مدیریت منوها</small>
                </h3>
                <ul class="breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="{{ url('adm-panel/dashboard') }}">پیشخوان</a>
                        <i class="fa fa-angle-left"></i>
                    </li>
                    <li>
                        <a href="{{ url('adm-panel/category/sort/list') }}"> اولیت بندی منوها</a>

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
@if(Session::has('save'))
<div class="alert alert-success" role="alert">
ذخیره سازی با موفقیت انجام گردید.
</div>
@endif
<div class="alert alert-info" role="alert">
اولویت بندی منوها بعد از جابه جایی و ثبت در صفحه اصلی وب سایت قابل مشاهده خواهد بود.
</div>
<div class="row-fluid">
        <div class="span12">
                        <div class="portlet box green">

                            <div class="portlet-title">
                                <div class="caption"><i class="fa fa-user"></i>اولویت بندی منوها</div>

                            </div>

                            <div class="portlet-body">
                              {!! Form::open(['url'=>'adm-panel/menu/sort/list']) !!}
                                <div id="My_Advanced_table_wrapper" class="dataTables_wrapper form-inline" role="grid">

                                <table class="table table-sortable table-striped table-bordered table-hover table-full-width dataTable"  aria-describedby="My_Advanced_table_info">
                                    <thead>
                                        <tr role="row">
                                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="My_Advanced_table" rowspan="1" colspan="1" aria-label="نام منو: مرتب کردن صعودی ستون ها " style="width: 337px;">نام منو</th>

                                        </tr>
                                    </thead>

                                <tbody role="alert" aria-live="polite" aria-relevant="all">
                                <?php
                                 $i=1;
                                 ?>
                                @foreach($menu as $key=>$value)
                                <tr draggable="true" class="odd">
                                            <input type="hidden" name="sort[ {{$value->id }}]">

                                            <td class=" "><span style="cursor: pointer;"><i class="fa fa-arrows"></i></span > {{ $value->title }}</td>

                                        </tr>



                              @endforeach
                                        </tbody></table>
                                        <div class="form-actions" id="add_etate_submit">
                                                            <button type="submit" class="btn green" id="submit_item"> <i class="fa fa-check"></i> ثبت</button>
                                                        </div>
                                        </div>
                                        {{ Form::close() }}
                            </div>
                        </div>
                        <!-- END EXAMPLE TABLE PORTLET-->
                    </div>
        </div>





























@endsection

@section('header')
	<link href="{{ url('resources/css/theme/uniform.default.css') }}" rel="stylesheet" type="text/css" media="screen"/>


@endsection

@section('footer')
<script type="text/javascript" src="{{ url('resources/js/theme/jquery.sortable.js') }}"></script>
<script src="{{ url('resources/js/theme/sweetalert.min.js') }}" type="text/javascript"></script>
@include('sweet::alert')
<script>

		$(function() {

            $('.table-sortable tbody').sortable({
                handle: 'span'
            });
            });
</script>

@endsection
