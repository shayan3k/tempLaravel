@extends('layouts.site',['class'=>'blog grid-no-sidebar'])

@section('content')

    <section class="banner-area">
        <div class="banner-overlay">
            <div class="banner-text text-center">
                <div class="container">
                    <!-- Section Title Starts -->
                    <div class="row text-center">
                        <div class="col-xs-12">
                            <!-- Title Starts -->
                            <h2 class="title-head">لیست <span>اخبار</span></h2>
                            <!-- Title Ends -->
                            <hr>
                            <!-- Breadcrumb Starts -->
                            <ul class="breadcrumb">
                                <li><a href="index.html"> خانه</a></li>
                                <li>اخبار</li>
                            </ul>
                            <!-- Breadcrumb Ends -->
                        </div>
                    </div>
                    <!-- Section Title Ends -->
                </div>
            </div>
        </div>
    </section>
    <section class="blog-page" style="background: #fff">
        <div class="container ">
        <div class="row">
            <div class="content col-xs-12 col-md-12">

                @foreach($news as $key=>$value)
                <article class="col-md-6">
                    <a href="{{ url('news/'.$value->title_url) }}"><h4>{{ $value->title }}</h4></a>
                    <!-- Figure Starts -->
                    <figure>
                        <a href="{{ url('news/'.$value->title_url) }}">
                            <img class="img-responsive" src="{{ url('resources/upload/news/'.$value->img) }}" alt="">
                        </a>
                    </figure>
                    <!-- Figure Ends -->
                    <!-- Excerpt Starts -->
                    @php
                        $text = explode("<!--more-->",$value->desc);
                    @endphp
                    <p class="excerpt" style="text-align: justify">@if(isset($text[1])) {!! \Illuminate\Support\Str::limit($text[1],200) !!} @else {!! \Illuminate\Support\Str::limit($value->desc,200) !!}  @endif</p>
                    <!-- Excerpt Ends -->
                    <a href="{{ url('news/'.$value->title_url) }}" class="btn btn-primary btn-readmore">
                        اطلاعات بیشتر
                    </a>

                </article>
                @endforeach
                <nav class="col-xs-12 text-center" aria-label="Page navigation">
                   {{ $news->render() }}
                </nav>
            </div>
        </div>
        </div>
    </section>


@endsection
