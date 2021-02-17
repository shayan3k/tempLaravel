@extends('layouts.site',['class'=>''])

@section('content')
    <section class="banner-area">
        <div class="banner-overlay">
            <div class="banner-text text-center">
                <div class="container">

                    <div class="row text-center">
                        <div class="col-xs-12">

                            <h2 class="title-head">سؤالات متداول <span>پرسیده شده</span></h2>

                            <hr>

                            <ul class="breadcrumb">
                                <li><a href="{{ url('') }}"> خانه</a></li>
                                <li>سؤالات متداول</li>
                            </ul>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="faq" style="background: #fff">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-8">

                    <div class="panel-group" id="accordion">
                      @foreach($faq as $key=>$value)
                        <div class="panel panel-default">
                            <!-- Panel Heading Starts -->
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $value->id }}">
                                        {{ $value->title }}</a>
                                </h4>
                            </div>
                            <!-- Panel Heading Ends -->
                            <!-- Panel Content Starts -->
                            <div id="collapse{{ $value->id }}" class="panel-collapse collapse">
                                <div class="panel-body">
                                {{ $value->desc }}
                                </div>
                            </div>
                            <!-- Panel Content Starts -->
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="sidebar col-xs-12 col-md-4">

                    <div class="widget recent-posts">
                        <h3 class="widget-title">پست های اخیر وبلاگ</h3>
                        <ul class="unstyled clearfix">

                            @foreach($news as $key=>$value)
                            <li>
                                <div class="posts-thumb pull-left">
                                    <a href="{{ url('news/'.$value->title_url) }}">
                                        <img alt="img" src="{{ url('resources/upload/news/'.$value->img) }}">
                                    </a>
                                </div>
                                <div class="post-info">
                                    <h4 class="entry-title">
                                        <a href="{{ url('news/'.$value->title_url) }}">{{ $value->title }}</a>
                                    </h4>
                                    <?php
                                    $jdf= new \App\lib\Jdf();
                                    ?>
                                    <p class="post-meta">
                                        <span class="post-date"><i class="fa fa-clock-o"></i> {{ $jdf->jdate("F ماه Y ",$value->date) }} </span>
                                    </p>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                </div>

            </div>
        </div>
    </section>
@endsection
