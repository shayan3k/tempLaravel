@extends('layouts.admin')
<?php
$jdf = new \App\lib\Jdf();
?>
@section('content')

<div class="row-fluid">
            <div class="span12">

                <h3 class="page-title">
                   پنل مدیریت وب سایت
                          <small>مدیریت سوالات متداول </small>
                </h3>
                <ul class="breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="{{ url('adm-panel/dashboard') }}">پیشخوان</a>
                        <i class="fa fa-angle-left"></i>
                    </li>
                    <li>
                        <a href="{{ url('adm-panel/question') }}">مدیریت سوالات متداول</a>

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
{{ Session::get('save') }}
</div>
@endif
@if(Session::has('not_save'))
<div class="alert alert-success" role="alert">
{{ Session::get('not_save') }}
</div>
@endif

<div class="row-fluid">
        <div class="span12">
                        <div class="portlet box green">

                            <div class="portlet-title">
                                <div class="caption"><i class="fa fa-question"></i>مدیریت سوالات </div>
                                <div class="actions">
                                    @can('add-q')
                                <a href="{{ url('adm-panel/question/create') }}" class="btn purple"><i class="fa fa-plus"></i> افزودن سوال جدید </a>
                                    @endcan
                                </div>
                            </div>

                            <div class="portlet-body">
                                <div id="My_Advanced_table_wrapper" class="dataTables_wrapper form-inline" role="grid">

                                <table class="table table-striped table-bordered table-hover table-full-width dataTable" id="My_Advanced_table" aria-describedby="My_Advanced_table_info">
                                    <thead>
                                        <tr role="row">
                                        <th class="hidden-480 sorting_desc" role="columnheader" tabindex="0" aria-controls="My_Advanced_table" rowspan="1" colspan="1" aria-sort="descending" aria-label="ردیف: مرتب کردن صعودی ستون ها " style="width: 143px;">ردیف</th>
                                         <th class="sorting" role="columnheader" tabindex="0" aria-controls="My_Advanced_table" rowspan="1" colspan="1" aria-label="عنوان سوال: مرتب کردن صعودی ستون ها " style="width: 337px;">عنوان سوال </th>
                                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="My_Advanced_table" rowspan="1" colspan="1" aria-label="عملیات: مرتب کردن صعودی ستون ها " style="width: 478px;">عملیات</th></tr>
                                    </thead>

                                <tbody role="alert" aria-live="polite" aria-relevant="all">
                                @foreach($question as $key=>$value)
                                <tr class="odd">
                                            <td class="hidden-480  sorting_1">{{ ++$key }}</td>
<td class=" ">{{ $value->title }}</td>

                                            <td class=" ">
                                                @can('view-q')
                                                <a href="{{ url('adm-panel/question/'.$value->id.'/edit') }}" class="btn mini purple size-13"><i class="fa fa-edit"></i> ویرایش </a>
                                                @endcan
                                                    @can('delete-q')
                                              <a href="#delModal_<?=$value->id?>" class="btn mini red" role="button" data-toggle="modal"><i class="fa fa-trash"></i> حذف </a>
                                                    @endcan
                                            </td>
                                        </tr>

                                            <div id="delModal_<?=$value->id?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h3 id="myModalLabel3" class="size-20">حذف سوال</h3>
                                </div>
                                <div class="modal-body">
                                    <p> آیا مایل به حذف سوال مورد نظر خود هستید؟ </p>
                                </div>
                                <div class="modal-footer">
                                <form method="post" action="{{ url('adm-panel/question/'.$value->id) }}" id="form">
                                                            <input type="hidden" name="_method" value="DELETE" >
                                                            {{ csrf_field() }}
                                        <input type="hidden" value="{{ $value->id }}" name="slide_id">
                                        <button type="button" class="btn red" data-dismiss="modal" aria-hidden="true">خیر</button>
                                        <button type="submit" class="btn green">بلی</button>
                                    </form>
                                </div>
                            </div>

                              @endforeach
                                        </tbody></table></div>
                            </div>
                        </div>
                        <!-- END EXAMPLE TABLE PORTLET-->
                    </div>
        </div>





























@endsection

@section('header')
	<link href="{{ url('resources/css/theme/uniform.default.css') }}" rel="stylesheet" type="text/css" media="screen"/>
		<link href="{{ url('resources/css/theme/DT_bootstrap_rtl.css') }}" rel="stylesheet" type="text/css" media="screen"/>
			<link href="{{ url('resources/css/theme/Dselect2.min.css') }}" rel="stylesheet" type="text/css" media="screen"/>


@endsection

@section('footer')
  <script type="text/javascript" src="{{ url('resources/js/theme/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ url('resources/js/theme/table-advanced.js') }}"></script>
<script type="text/javascript" src="{{ url('resources/js/theme/DT_bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ url('resources/js/theme/DT_bootstrap.js') }}"></script>

<script>
   // MY ADVANCED TABLE FUNCTION
    var MyTableAdvanced = function () {
        var initTable = function () {
            var oTable = $('#My_Advanced_table').dataTable({
                "aoColumnDefs": [
                    {"aTargets": [0]}
                ],
                "aaSorting": [[0, 'asc']],
                "aLengthMenu": [
                    [5, 15, 20, -1],
                    [5, 15, 20, "All"] // change per page values here
                ],
                // set the initial value
                "iDisplayLength": 10
            });

            jQuery('#My_Advanced_table_wrapper').find('.dataTables_filter input').addClass("m-wrap small"); // modify table search input
            jQuery('#My_Advanced_table_wrapper').find('.dataTables_length select').addClass("m-wrap small"); // modify table per page dropdown
            jQuery('#My_Advanced_table_wrapper').find('.dataTables_length select').select2(); // initialize select2 dropdown

            $('#My_Advanced_table_column_toggler input[type="checkbox"]').change(function () {
                var iCol = parseInt($(this).attr("data-column"));
                var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
                oTable.fnSetColumnVis(iCol, (bVis ? false : true));
            });
        };

        return {

            init: function () {
                if (!jQuery().dataTable) {
                    return;
                }
                initTable();
            }
        };
    }();
    $(function () {
        MyTableAdvanced.init();
    })

</script>
@endsection
