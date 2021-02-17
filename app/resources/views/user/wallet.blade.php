@extends('layouts.site',['class'=>''])

@section('content')
    <section class="banner-area">
        <div class="banner-overlay">
            <div class="banner-text text-center">
                <div class="container">

                    <div class="row text-center">
                        <div class="col-xs-12">

                            <h2 class="title-head">کیف پول <span>دیجیتالی</span></h2>

                            <hr>

                            <ul class="breadcrumb">
                                <li><a href="{{ url('') }}"> خانه</a></li>
                                <li>کیف پول</li>
                            </ul>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    @php
    $user = \Illuminate\Support\Facades\Auth::user();

    @endphp
    <section class="pricing" style="background: #fff">
        <div class="container">
            <!-- Section Content Starts -->
            <h3 class="text-center">کیف پول دیجیتال</h3>
            <p class="text-center">کاربر گرامی کیف پول دیجیتالی شما در باکس های ذیل قابل نمایش می باشد</p>

            @if(empty($user->get_code))

            <div class="alert alert-info text-center" role="alert">
                حساب کاربری شما به دلیل عدم ارسال تصویر کارت ملی شخصی در حالت بسته می باشد و امکان مشاهده کیف پول میسر نمی باشد.
            </div>

                {!! Form::open(['url'=>'profile/code','files'=>true]) !!}
                    <div class="col-xs-12 col-md-4">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="img" name="img" required>
                            <label class="custom-file-label" for="validatedCustomFile">انتخاب فایل</label>

                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-order pull-left">ارسال تصویر</button>

                {{ Form::close() }}
            @elseif(\Illuminate\Support\Facades\Auth::user()->verify==0)
                <div class="alert alert-success text-center" role="alert">
                    حساب شما در درست بررسی است . بعد از تایید حساب کاربری پیامکی جهت اطلاع رسانی به شماره همراه ارسال خواهد شد
                </div>
            @else
            <div class="row pricing-tables-content pricing-page">
                <div class="pricing-container">
                   @php
                   $coin = \App\Coin::get();
                   @endphp

                    <ul class="pricing-list bounce-invert">
                    @foreach($coin as $key=>$value)
                        <li class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                            <ul class="pricing-wrapper">

                                <li>
                                    <header class="pricing-header">
                                        <h2>ارز دیجیتال {{ $value->title }}</h2>
                                        <div class="price">
                                            <span class="currency"><img width="40" src="{{ url('resources/upload/coin/'.$value->img) }}"/></span>
                                           @php
                                           $values = \Illuminate\Support\Facades\DB::table('wallet_user')->where('user_id',\Illuminate\Support\Facades\Auth::user()->id)->where('coin_id',$value->id)->value('money');
                                           @endphp
                                            <span class="value">{{ $values }}</span>
                                        </div>
                                    </header>


                                </li>

                            </ul>
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>
            @endif
        </div>
    </section>


@endsection
