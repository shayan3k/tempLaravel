@extends('layouts.site',['class'=>''])

@section('slider')
<?php
$section_four = \App\SectionFourSetting::first();
$single_setting = \App\SingleSetting::first();
$section_two = \App\SectionTwoSetting::first();
$image_setting = \App\ImagesSetting::first();
$section_three = \App\SectionThreeSetting::first();
$section_sec_one = \App\SectionSecOneSetting::first();
?>
    <div id="main-slide" class="carousel slide carousel-fade" data-ride="carousel">
        <!-- Indicators Starts -->
        <ol class="carousel-indicators visible-lg visible-md">
            <li data-target="#main-slide" data-slide-to="0" class="active"></li>
            <li data-target="#main-slide" data-slide-to="1"></li>
            <li data-target="#main-slide" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
        @foreach($slider as $key=>$value)
            <div class="item @if($key==0) active @endif bg-parallax item-{{ ++$key }}" style="  background-image: url({{ url('resources/upload/slider/'.$value->img) }});">
                <div class="slider-content">
                    <div class="container">
                        <div class="slider-text text-center">
                            <h3 class="slide-title"><span>{!! $value->desc  !!}</span></h3>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach


        </div>

        <a class="left carousel-control" href="{{ url('') }}#main-slide" data-slide="prev">
            <span><i class="fa fa-angle-left"></i></span>
        </a>
        <a class="right carousel-control" href="{{ url('') }}#main-slide" data-slide="next">
            <span><i class="fa fa-angle-right"></i></span>
        </a>
        <!-- Carousel Controlers Ends -->
    </div>

@endsection
@section('feature')
    <section class="features">
        <div class="container">
            <div class="row features-row">
                <!-- Feature Box Starts -->
                <div class="feature-box col-md-4 col-sm-12">
                        <span class="feature-icon">
							<img id="download-bitcoin" src="{{ url('resources/upload/section3/'.$section_three['icon_one']) }}" alt="download bitcoin">
						</span>
                    <div class="feature-box-content">
                        <h3>{{ $section_three['txt_one'] }}</h3>
                        <p>{{ $section_three['desc_one'] }}</p>
                    </div>
                </div>
                <!-- Feature Box Ends -->
                <!-- Feature Box Starts -->
                <div class="feature-box two col-md-4 col-sm-12">
                        <span class="feature-icon">
							<img id="add-bitcoins" src="{{ url('resources/upload/section3/'.$section_three['icon_two']) }}" alt="add bitcoins">
						</span>
                    <div class="feature-box-content">
                        <h3>{{ $section_three['txt_two'] }}</h3>
                        <p>{{ $section_three['desc_two'] }}</p>
                    </div>
                </div>
                <!-- Feature Box Ends -->
                <!-- Feature Box Starts -->
                <div class="feature-box three col-md-4 col-sm-12">
                        <span class="feature-icon">
							<img id="buy-sell-bitcoins" src="{{ url('resources/upload/section3/'.$section_three['icon_three']) }}" alt="buy and sell bitcoins">
						</span>
                    <div class="feature-box-content">
                        <h3>{{ $section_three['txt_three'] }}</h3>
                        <p>{{ $section_three['desc_three'] }}</p>
                    </div>
                </div>
                <!-- Feature Box Ends -->
            </div>
        </div>
    </section>
@endsection
@section('about')
    <section class="about-us" style="background-image: url(https://www.unionarz.com/back5.jpg)">
        <div class="container">
            <!-- Section Title Starts -->
            <div class="row text-center">
                <h2 class="title-head" style="color:#111">درباره <span>ما</span></h2>
                <div class="title-head-subtitle">
                    <p>{{ $section_two['txt_one'] }}</p>
                </div>
            </div>
            <!-- Section Title Ends -->
            <!-- Section Content Starts -->
            <div class="row about-content">
                <!-- Image Starts -->
                <div class="col-sm-12 col-md-5 col-lg-6 text-center">
                    <img id="about-us" class="img-responsive img-about-us" src="{{ url('resources/upload/logos/'.$image_setting['about']) }}" alt="about us">
                </div>
                <!-- Image Ends -->
                <!-- Content Starts -->
                <div class="col-sm-12 col-md-7 col-lg-6">
                    {!! $section_two['desc_two'] !!}
                    <a class="btn btn-primary" href="{{ url($section_two['connect_two']) }}">{{ $section_two['btn_val'] }}</a>
                </div>
                <!-- Content Ends -->
            </div>
            <!-- Section Content Ends -->
        </div>
    </section>
@endsection
@section('image')
    <section class="image-block">
        <div class="container-fluid">
            <div class="row">
                <!-- Features Starts -->
                <div class="col-md-8 ts-padding img-block-left">

                    @php
                    $id=0;
                    @endphp

                       @for($i=1;$i<=3;$i++)
                        <div class="row">
                        <?php
                            $services = \App\Services::where('status',1)->where('id','>',$id)->limit(2)->get();
                            ?>
                            @foreach($services as $key=>$value)
                            <div class="col-sm-6 col-md-6 col-xs-12" style="padding-left: 0 !important;">
                                <div class="feature text-center">
                                    <span class="feature-icon">
										<img id="strong-security" src="{{ url('resources/upload/services/'.$value->img) }}" alt="strong security"/>
									</span>
                                    <h3 class="feature-title">{{ $value->title }}</h3>
                                    <p>{{ $value->desc_low }}</p>
                                </div>
                            </div>
                           @php
                               $id = $value->id;
                               @endphp
                            @endforeach



                        </div>

                   @endfor

                </div>

                <div class="col-md-4 ts-padding bg-image-1"></div>

            </div>
        </div>
    </section>
@endsection
@section('user')
    <section class="about-us" style="background: #fff">
        <div class="container">
            <!-- Section Title Starts -->
            <div class="row text-center">
                <?php
                $s = explode("-",$section_sec_one->txt_title);

                ?>
                <h2 class="title-head" style="color:#111">{{ $s[0] }} <span>@if(isset($s[1])) {{ $s[1] }} @endif</span></h2>

                <div class="title-head-subtitle">
                    <p>{{ $section_sec_one['txt_one'] }}</p>
                </div>
            </div>
            <!-- Section Title Ends -->
            <!-- Section Content Starts -->
            <div class="row about-content">
                <!-- Image Starts -->
                <div class="col-sm-12 col-md-5 col-lg-6 text-center">
                    <img id="about-us" class="img-responsive img-about-us" src="{{ url('resources/upload/logos/'.$section_sec_one['img']) }}" alt="about us">
                </div>
                <!-- Image Ends -->
                <!-- Content Starts -->
                <div class="col-sm-12 col-md-7 col-lg-6">
                    {!! $section_sec_one['desc_two'] !!}
                    <a class="btn btn-primary" href="{{ url($section_sec_one['connect_two']) }}">{{ $section_sec_one['btn_val'] }}</a>
                </div>
                <!-- Content Ends -->
            </div>
            <!-- Section Content Ends -->
        </div>
    </section>
@endsection
@section('chart')
    <section class="image-block2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 bg-grey-chart">

                    <div class="chart-widget light-chart chart-2">
                        <div>
                            <div class="btcwdgt-chart" bw-theme="light"></div>
                        </div>
                    </div>
                </div>


                <div class="col-md-6 bg-grey-chart">
                <div style="height: 305px;margin-top: 70px;background: #fff;">
                    <script src="https://arzdigital.com/widgets/?valType=price&coin=btc"></script>
                </div>

                </div>
                <!-- Chart Ends -->
            </div>
        </div>
    </section>
@endsection
@section('news')
    <section class="blog" style="background: #fff">
        <div class="container">
            <!-- Section Title Starts -->
            <div class="row text-center">
                <h2 class="title-head" style="color:#111">اخبار <span>{{ $single_setting['title'] }}</span></h2>
                <div class="title-head-subtitle">
                    <p>{{ $section_four['txt_news'] }}</p>
                </div>
            </div>
<?php 
$jdf = new \App\lib\Jdf();
?>
            <div class="row latest-posts-content">
            @foreach($news as $key=>$value)
                @php
                $text = explode("<!--more-->",$value->desc);
                @endphp
                <div class="col-sm-4 col-md-4 col-xs-12">
                    <div class="latest-post">
                        <!-- Featured Image Starts -->
                        <a href="{{ url('news/'.$value->title_url) }}"><img class="img-responsive" src="{{ url('resources/upload/news/'.$value->img) }}" alt="img"></a>
                        <!-- Featured Image Ends -->
                        <!-- Article Content Starts -->
                        <div class="post-body">
                            <h4 class="post-title">
                                <a href="{{ url('news/'.$value->title_url) }}">{{ $value->title }}</a>
                            </h4>
                            <div class="post-text" style="height: 60px">
                                <p>@if(isset($text[1])) {!! \Illuminate\Support\Str::limit($text[0],100) !!} @else {!! \Illuminate\Support\Str::limit($value->desc,100) !!} @endif</p>
                            </div>
                        </div>
                        <div class="post-date">
                            <span>{{ $jdf->jdate("j",$value->date) }}</span>
                            <span>{{ $jdf->jdate("F",$value->date) }}</span>
                        </div>
                        <a href="{{ url('news/'.$value->title_url) }}" class="btn btn-primary">اطلاعات بیشتر</a>
                        <!-- Article Content Ends -->
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section>
@endsection
