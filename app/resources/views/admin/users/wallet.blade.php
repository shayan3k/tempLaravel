@extends('layouts.admin')
<?php
$jdf = new \App\lib\Jdf();
?>
@section('content')

<div class="row-fluid">
            <div class="span12">

                <h3 class="page-title">
                   پنل مدیریت وب سایت
                            <small>کیف پول {{ $user->fname.' '.$user->lname }}</small>
                </h3>
                <ul class="breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="{{ url('adm-panel/dashboard') }}">پیشخوان</a>
                        <i class="fa fa-angle-left"></i>
                    </li>
                    <li>
                        <i class="fa fa-users"></i>
                        <a href="{{ url('adm-panel/users') }}">مدیریت کاربران</a>

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

<div class="tabbable tabbable-custom">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#tab_1_1" data-toggle="tab">افزودن کیف پول دیجیتالی</a></li>
			</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="tab_1_1">


                            {!! Form::open(['url'=>'adm-panel/users/wallet/'.$user->id]) !!}


<div class="row-fluid">
 <div  class="span12 product_item_div">
 <div class="row-fluid">

 	<table class="table-bordered table-striped table-condensed flip-content" style="width: 100%;">
 	@foreach($coin as $key=>$value)
 	<tr>

 	<td colspan="2" style="font-weight: bold;font-style: italic">{{ $value->title }}</td>

 	</tr>
    <?php
            $values = \Illuminate\Support\Facades\DB::table('wallet_user')->where('user_id',$user->id)->where('coin_id',$value->id)->value('money');
    ?>
    <tr>
     	<td>
     	<input type="text" value="{{ $values }}" class="form-control m-wrap span12" name="item[<?=$value->id ?>]" >
     	</td>

     	</tr>


 	@endforeach
 	</table>


    </div>





</div>

</div>

				<!-- submit -->
								<div class="form-actions" id="add_etate_submit">

									<button type="submit" class="btn green YEKAN" id="form1_submit"><i class="fa fa-check"></i> ثبت </button>
								</div>

						{{ Form::close() }}

					</div>
				</div>
			</div>



            @endsection

@section('header')
<link href="{{ url('resources/css/theme/uniform.default.css') }}" rel="stylesheet" type="text/css" media="screen"/>
@endsection
            @section('footer')

@endsection
