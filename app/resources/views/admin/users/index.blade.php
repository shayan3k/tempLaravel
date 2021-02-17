@extends('layouts.admin')
<?php $jdf = new \App\lib\Jdf(); ?>
@section('content')

    <div class="row-fluid">
        <div class="span12">

            <h3 class="page-title">
                پنل مدیریت وب سایت
                <small>مدیریت کاربران</small>
            </h3>
            <ul class="breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="{{ url('adm-panel/dashboard') }}">پیشخوان</a>
                    <i class="fa fa-angle-left"></i>
                </li>
                <li>
                    <a href="{{ url('adm-panel/users') }}">مدیریت کاربران</a>

                </li>


                <li class="pull-left no-text-shadow hidden-phone">
                    <div id="dashboard-calender">
                        <i class="fa fa-calendar" style="color:white"></i>
                        امروز {{ $jdf->jdate('l j   F  Y') }}
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <!-- -->

    @if (Session::has('save'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('save') }}
        </div>
    @endif
    @if (Session::has('not_save'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('not_save') }}
        </div>
    @endif



    <div class="row-fluid">
        <div class="span12">



            <div class="portlet box red">
                <div class="portlet-title">
                    <div class="caption"><i class="fa fa-user"></i>مدیریت کاربران </div>
                    <div class="actions">
                        @can('add-users')
                            <a href="{{ url('adm-panel/users/create') }}" class="btn green"><i class="fa fa-plus"></i> افزودن
                                کاربر جدید </a>
                        @endcan
                        <a href="{{ url('adm-panel/users/excel') }}" class="btn green"><i class="fa fa-users"></i> خروجی
                            کاربران </a>
                    </div>
                </div>
                <div class="portlet-body">

                    <table class="table-bordered table-striped table-condensed flip-content" id="new-table"
                        style="width:100%">
                        <thead class="flip-content">
                            <tr>
                                <th>ردیف</th>
                                <th>نام کاربری</th>
                                <th class="hidden-1200">نام و نام خانوادگی</th>
                                <th>سطح دسترسی</th>
                                <th>تاریخ عضویت</th>
                                <th>تصویر کارت ملی</th>
                                <th>وضعیت حساب</th>
                                <th width="130">عملیات</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($users as $key => $value)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $value->username }}</td>
                                    <td class="hidden-1200">{{ $value->fname . ' ' . $value->lname }}</td>

                                    <td>{{ $role[$value->role] }}</td>
                                    <td>{{ $jdf->jdate('Y/n/j | H:i', $value->date) }}</td>
                                    <td>
                                        @if ($value->get_code) <a download
                                                href="{{ asset('resources/upload/code/' . $value->get_code['img_code']) }}"
                                                class="btn mini blue btn-user-profile"><i class="fa fa-download"></i> دانلود
                                            </a>
                                        @else آپلود نشده @endif
                                    </td>

                                    <td>
                                    @if ($value->verify == 1) تایید شده @else تایید
                                            نشده @endif
                                    </td>
                                    <td>
                                        @if (\Illuminate\Support\Facades\Auth::user()->role == 'admin')
                                            @can('role-users')
                                                <a href="{{ url('adm-panel/users/access/' . $value->id) }}"
                                                    class="btn mini blue btn-user-profile"><i class="fa fa-lock"></i> سطح دسترسی
                                                </a>
                                            @endcan
                                        @endif
                                        @can('edit-users')
                                            <a href="{{ url('adm-panel/users/' . $value->id . '/edit') }}"
                                                class="btn mini purple btn-user-profile"><i class="fa fa-edit"></i> ویرایش </a>
                                        @endcan
                                        @if ($value->get_code and $value->verify == 0)
                                            <a href="{{ url('adm-panel/users/verify/' . $value->id) }}"
                                                class="btn mini yellow btn-user-profile"><i class="fa fa-check"></i> تایید
                                            </a>
                                        @endif
                                        @if ($value->get_code and $value->verify == 1)
                                            @can('view-wallet')
                                                <a href="{{ url('adm-panel/users/wallet/' . $value->id) }}"
                                                    class="btn mini yellow btn-user-profile"><i class="fa fa-dollar"></i> کیف
                                                    پول </a>
                                            @endcan
                                        @endif

                                        @can('delete-users')
                                            <a href="#delModal_<?= $value->id ?>" class="btn mini red" role="button" data-toggle="modal"><i class="fa fa-trash"></i> حذف </a>
                   @endcan
                    </td>
                   </tr>

        <div id="delModal_<?= $value->id ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
                    <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                     <h3 id="myModalLabel3" class="size-20">حذف کاربر</h3>
                    </div>
                    <div class="modal-body">
                     <p> آیا مایل به حذف کاربر مورد نظر خود هستید؟ </p>
                    </div>
                    <div class="modal-footer">
                                                            <form method="post" action="{{ url('adm-panel/users/' . $value->id) }}" id="form">
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
                @if (isset($page))
                                                                    <div class="pagination_wrapper clearfix">
                                                            {{ $users->appends(request()->query())->links() }}
                                                                    </div>
                                                                    @endif
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

            <script src="{{ url('resources/js/theme/sweetalert.min.js') }}" type="text/javascript"></script>
            @include('sweet::alert')

@endsection
