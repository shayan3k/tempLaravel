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
                        <a href="{{ url('adm-panel/menu') }}">مدیریت منوها</a>

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
                        <div class="portlet box purple">

                            <div class="portlet-title">
                                <div class="caption"><i class="fa fa-file"></i> مدیریت منوها</div>
                                <div class="actions">
@can('add-menu')
     <a href="{{ url('adm-panel/menu/create') }}" class="btn green"><i class="fa fa-plus"></i> افزودن منو جدید </a>
                                    @endcan
    @can('view-menu')
  <a href="{{ url('adm-panel/menu/sort/list') }}" class="btn red"><i class="fa fa-cycle"></i> تغییر ترتیب منوها </a>
    @endcan
                                </div>
                            </div>

                            <div class="portlet-body">
                                <div id="My_Advanced_table_wrapper" class="dataTables_wrapper form-inline" role="grid">

                                <table class="table table-striped table-bordered table-hover table-full-width dataTable" id="My_Advanced_table" aria-describedby="My_Advanced_table_info">
                                    <thead>
                                        <tr role="row">
                                        <th class="hidden-480 sorting_desc" role="columnheader" tabindex="0" aria-controls="My_Advanced_table" rowspan="1" colspan="1" aria-sort="descending" aria-label="ردیف: مرتب کردن صعودی ستون ها " style="width: 143px;">ردیف</th>
                                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="My_Advanced_table" rowspan="1" colspan="1" aria-label="نام منو: مرتب کردن صعودی ستون ها " style="width: 337px;">نام منو</th>
                                          <th class="sorting" role="columnheader" tabindex="0" aria-controls="My_Advanced_table" rowspan="1" colspan="1" aria-label="نام منو: مرتب کردن صعودی ستون ها " style="width: 337px;">نوع منو</th>
                                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="My_Advanced_table" rowspan="1" colspan="1" aria-label="عملیات: مرتب کردن صعودی ستون ها " style="width: 478px;">عملیات</th>
                                        </tr>
                                    </thead>

                                <tbody role="alert" aria-live="polite" aria-relevant="all">
                                @foreach($menu as $key=>$value)
                                <tr class="odd">
                                            <td class="hidden-480  sorting_1">{{ ++$key }}</td>
                                            <td class=" ">{{ $value->title }}</td>
                                             <td class=" ">@if($value->type_menu==1)برگه @else لینک خارجی @endif</td>
                                            <td class=" ">
                                                @can('edit-menu')
                                              <a href="{{ url('adm-panel/menu/'.$value->id.'/edit') }}" class="btn mini purple size-13"><i class="fa fa-edit"></i> ویرایش </a>
                                                @endcan
                                                @if($value->status==1)
                                                 @php
                                                     $href= ''.url('adm-panel/menu/status/'.$value->id.'/0').'';
                                                 @endphp
                                                @else
                                                    @php
                                                        $href= ''.url('adm-panel/menu/status/'.$value->id.'/1').'';
                                                    @endphp

                                                @endif
                                                <a href="{{ $href }}" class="btn mini important size-13"><i class="fa fa-eye"></i> @if($value->status==1) غیرفعال کن @else فعال کن @endif </a>
                                                @can('delete-menu')
                                                <a href="#delModal_<?=$value->id?>" class="btn mini red" role="button" data-toggle="modal"><i class="fa fa-trash"></i> حذف </a>
                                                @endcan
                                            </td>
                                        </tr>

                                            <div id="delModal_<?=$value->id?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                                <h3 id="myModalLabel3" class="size-20">حذف منو</h3>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <p> آیا مایل به حذف منو مورد نظر خود هستید؟ </p>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                            <form method="post" action="{{ url('adm-panel/remove/menu') }}" id="form">
                                                                                                        <input type="hidden" name="_method" value="DELETE" >
                                                                                                        {{ csrf_field() }}
                                                                                                        <input type="hidden" value="{{ $value->id }}" name="menu_id">
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

			<link href="{{ url('resources/css/theme/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" media="screen"/>

@endsection

@section('footer')
  <script type="text/javascript" src="{{ url('resources/js/theme/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ url('resources/js/theme/table-advanced.js') }}"></script>
<script type="text/javascript" src="{{ url('resources/js/theme/DT_bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ url('resources/js/theme/DT_bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ url('resources/js/theme/select2.full.min.js') }}"></script>
  <script src="{{ url('resources/js/theme/sweetalert.min.js') }}" type="text/javascript"></script>
  @include('sweet::alert')
<script>
   // MY ADVANCED TABLE FUNCTION
    var MyTableAdvanced = function () {
        var initTable = function () {
            var oTable = $('#My_Advanced_table').dataTable({
                "aoColumnDefs": [
                    {"aTargets": [0]}
                ],
                "aaSorting": [[0, 'desc']],
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
