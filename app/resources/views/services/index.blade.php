@extends('layouts.site',['class'=>''])

@section('content')

    <section class="banner-area">
        <div class="banner-overlay">
            <div class="banner-text text-center">
                <div class="container">
                    <!-- Section Title Starts -->
                    <div class="row text-center">
                        <div class="col-xs-12">
                            <!-- Title Starts -->
                            <h2 class="title-head">خدمات <span>ما</span></h2>
                            <!-- Title Ends -->
                            <hr>
                            <!-- Breadcrumb Starts -->
                            <ul class="breadcrumb">
                                <li><a href="{{ url('') }}"> خانه</a></li>
                                <li>خدمات</li>
                            </ul>
                            <!-- Breadcrumb Ends -->
                        </div>
                    </div>
                    <!-- Section Title Ends -->
                </div>
            </div>
        </div>
    </section>
    <section class="services" style="background: #fff">
        <div class="container">
            <div class="row">
                @foreach($services as $key=>$value)
                <div class="col-md-6 service-box">
                    <div>
                        <img id="download-bitcoin" src="{{ url('resources/upload/services/'.$value->img) }}" alt="{{ $value->title }}">
                        <div class="service-box-content">
                            <h3>{{ $value->title }}</h3>
                            <p>{{ $value->desc_high }}</p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>

@endsection




