@extends('layouts.site',['class'=>''])

@section('content')
<?php
$jdf = new \App\lib\Jdf();
?>
    <section class="banner-area">
        <div class="banner-overlay">
            <div class="banner-text text-center">
                <div class="container">
                    <!-- Section Title Starts -->
                    <div class="row text-center">
                        <div class="col-xs-12">
                            <!-- Title Starts -->
                            <h2 class="title-head banner-post-title">{{ $news->title }}</h2>
                            <!-- Title Ends -->
                            <!-- Meta Starts -->
                            <div class="meta">
                                <span><i class="fa fa-calendar"></i> {{ $jdf->jdate("j F سال Y",$news->date) }}</span>
                                <span><i class="fa fa-tags"></i> {{ $news->keywords }}</span>
                            </div>
                            <!-- Meta Ends -->
                        </div>
                    </div>
                    <!-- Section Title Ends -->
                </div>
            </div>
        </div>
    </section>


<section class="blog-page" style="background: #fff">
    <div class="container">
    <div class="row">
        <div class="content col-xs-12 col-md-8">
            <!-- Article Starts -->
            <article>
                <!-- Figure Starts -->
                <figure class="blog-figure">
                    <img class="img-responsive" src="{{ url('resources/news/'.$news->img) }}" alt="">
                </figure>
                <!-- Figure Ends -->
                <!-- Content Starts -->
                <div class="content-article">
                    {!! $news->desc !!}
                </div>

                <div class="meta second-font">
                    <span><i class="fa fa-calendar"></i>{{ $jdf->jdate("j F سال Y",$news->date) }}</span>
                    <span><i class="fa fa-tags"></i> {{ $news->keywords }}</span>
                </div>

            </article>
            <!-- Article Ends -->
        </div>
        <!-- Sidebar Starts -->
        <div class="sidebar col-xs-12 col-md-4">

            <div class="widget recent-posts">
                <h3 class="widget-title">اخبار اخیر</h3>
                <ul class="unstyled clearfix">
            @foreach($news_list as $key=>$value)
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
                            <p class="post-meta">
                                <span class="post-date"><i class="fa fa-clock-o"></i>{{ $jdf->jdate("j F سال Y",$value->date) }}</span>
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
