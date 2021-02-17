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
                            <h2 class="title-head">{{ $menu->title }}</h2>
                            <!-- Title Ends -->
                            <hr>
                            <!-- Breadcrumb Starts -->
                            <ul class="breadcrumb">
                                <li><a href="{{ url('') }}"> خانه</a></li>
                                <li>{{ $menu->title }}</li>
                            </ul>
                            <!-- Breadcrumb Ends -->
                        </div>
                    </div>
                    <!-- Section Title Ends -->
                </div>
            </div>
        </div>
    </section>
    <section class="terms-of-services" style="background: #fff">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                 {!! $menu->get_cat['content'] !!}
                </div>
            </div>
        </div>
    </section>
@endsection
