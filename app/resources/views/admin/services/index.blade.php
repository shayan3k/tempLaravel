@extends('layouts.admin')
<?php
$jdf = new \App\lib\Jdf();
?>
@section('content')

<div class="row-fluid">
            <div class="span12">

                <h3 class="page-title">
                   پنل مدیریت وب سایت
                            <small>مدیریت خدمت ها</small>
                </h3>
                <ul class="breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="{{ url('adm-panel/dashboard') }}">پیشخوان</a>
                        <i class="fa fa-angle-left"></i>

                    </li>
                         <li>

                        <a href="{{ url('adm-panel/services') }}">مدیریت خدمات </a>

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
									<div class="caption"><i class="fa fa-servicepaper-o"></i>مدیریت خدمت ها</div>

									<div class="actions">
                                        @can('add-services')
										<a href="{{ url('adm-panel/services/create') }}" class="btn purple"><i class="fa fa-plus"></i> افزودن خدمت جدید </a>
                                        @endcan
								    	</div>

								</div>
								<div class="portlet-body flip-scroll">






													<table class="table-bordered table-striped table-condensed flip-content" id="new-table">
										<thead class="flip-content">
											<tr>

												<th>شناسه خدمت</th>
												<th>عنوان خدمت</th>
                                                <th>نمایش در صفحه اول</th>
												<th>عملیات</th>
											</tr>
										</thead>
										<tbody>
										        @foreach($service as $key=>$value)
														<tr>

														<td>{{ $value->id }}</td>
														<td><a href="{{ url('adm-panel/services/'.$value->id.'/edit') }}" target="_blank">{{ $value->title }}</a></td>
                                                         <td>@if($value->status==1) <label class="badge badge-success">فعال</label> @else <label class="badge badge-important">غیرفعال</label>  @endif</td>
														<td>
                                                            @can('edit-services')
														<a href="{{ url('adm-panel/services/'.$value->id.'/edit') }}" class="btn mini purple size-13"><i class="fa fa-edit"></i> ویرایش </a>
                                                            @endcan
                                                                @can('delete-services')
													 <a href="#delModal_<?=$value->id?>" class="btn mini red" role="button" data-toggle="modal"><i class="fa fa-trash"></i> حذف </a>
                                                             @endcan
														</td>
													</tr>


                                            <div id="delModal_<?=$value->id?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h3 id="myModalLabel3" class="size-20">حذف خدمت</h3>
                                </div>
                                <div class="modal-body">
                                    <p> آیا مایل به حذف خدمت مورد نظر خود هستید؟ </p>
                                </div>
                                <div class="modal-footer">
                                <form method="post" action="{{ url('adm-panel/services/'.$value->id) }}" id="form">
                                                            <input type="hidden" name="_method" value="DELETE" >
                                                            {{ csrf_field() }}
                                                            <input type="hidden" value="{{ $value->id }}" name="cat_id">
                                        <button type="button" class="btn red" data-dismiss="modal" aria-hidden="true">خیر</button>
                                        <button type="submit" class="btn green">بلی</button>
                                    </form>
                                </div>
                            </div>





                                            @endforeach



										</tbody>
									</table>

									<div class="clearfix"></div>
 @if(isset($page))
                            <div class="pagination_wrapper clearfix">
                    {{ $service->appends(request()->query())->links() }}
                            </div>
                            @endif
								</div>
							</div>













</div>






</div>




@endsection


@section('header')
<link href="{{ url('resources/css/theme/uniform.default.css') }}" rel="stylesheet" type="text/css" media="screen"/>
<link href="{{ url('resources/css/theme/select2.min.css') }}" rel="stylesheet" type="text/css" media="screen"/>
<link href="{{ url('resources/css/theme/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" media="screen"/>

@endsection


 @section('footer')

 <script type="text/javascript" src="{{ url('resources/js/theme/select2.full.min.js') }}"></script>
 <script type="text/javascript" src="{{ url('resources/js/theme/remote-select.js') }}"></script>
 <script src="{{ url('resources/js/theme/sweetalert.min.js') }}" type="text/javascript"></script>
 @include('sweet::alert')

 @endsection
