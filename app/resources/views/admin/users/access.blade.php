@extends('layouts.admin')
<?php
$jdf = new \App\lib\Jdf();
?>
@section('content')

<div class="row-fluid">
            <div class="span12">

                <h3 class="page-title">
                   پنل مدیریت وب سایت
                            <small> سطح دسترسی {{ $user->fname.' '.$user->lname }}</small>
                </h3>
                <ul class="breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="{{ url('adm-panel/dashboard') }}">پیشخوان</a>
                        <i class="fa fa-angle-left"></i>
                    </li>
                    <li>
                        <a href="{{ url('adm-panel/users') }}">مدیریت کاربرها</a>

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






<div class="container-fluid">

    {!! Form::model($user,['method'=>'PUT','url'=>['adm-panel/users/access',$user['id']]]) !!}
                        <div class="row-fluid">

                            <div class="span12">

                                <div class="tab-pane row-fluid profile-account" id="tab_1_5">
                                    <input type="hidden" name="change_permissions" value="change_permissions">
                                    <div class="row-fluid">

                                        <div class="span12">
                                            <div class="span1"></div>
                                            <div class="span11">

                                                <div class="portlet-body form">

                                                    <?php
                                                    $modules = \Illuminate\Support\Facades\DB::table('permissions_module')->get();
                                                    ?>

                                                    @foreach($modules as $key=>$value)
                                                        <?php

                                                        $permissions = \Illuminate\Support\Facades\DB::table('permissions')->where('module_id',$value->id)->get();
                                                        ?>
                                                        <div class="control-group row">
                                                            <h3 class="form-section" style="font-size: 30px;">{{ $value->module_label }}</h3>
                                                            <label class="control-label size-18">دسترسی ها</label>

                                                            <div class="controls">
                                                                @foreach($permissions as $key1=>$value1)
                                                                    <?php
                                                                    $count = \Illuminate\Support\Facades\DB::table('permissions_user')->where('user_id',$user->id)->where('permissions_id',$value1->id)->count();
                                                                    ?>
                                                                    <label class="checkbox span4">

                                                                        <input  name="per_user[]" @if($count > 0) checked @endif value="{{ $value1->id }}"  type="checkbox"  >
                                                                        {{ $value1->label }}
                                                                    </label>
                                                                @endforeach


                                                            </div>
                                                        </div>
                                                @endforeach
                                                <!-- -->



                                                    <!-- -->






                                                </div>

                                            </div>

                                            <!--end span12-->
                                        </div>




                                    </div>


                                </div>

                            </div>




                        </div>

                        <div class="form-actions" id="add_etate_submit">
                            <button type="submit" class="btn green"  id="submit_item"> <i class="fa fa-check"></i> ذخیره </button>
                        </div>

                 {{ Form::close() }}

                </div>







@endsection

@section('header')
    <link href="{{ url('resources/css/theme/uniform.default.css') }}" rel="stylesheet" type="text/css" media="screen"/>

@endsection

@section('footer')

@endsection
