@extends('layouts.site',['class'=>''])

@section('content')
<?php
$setting = \App\SingleSetting::first();
?>
    <section class="contact" style="background: #fff">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-8 contact-form">
                    @if(\Illuminate\Support\Facades\Session::has('send'))
                        <div class="alert alert-success" role="alert">
                            پیام شما با موفقیت ارسال گردید. با نشکر از شما
                        </div>
                    @endif

                    <h3 class="col-xs-12">احساس راحتی کنید که پیامی را به ما میدهید</h3>
                    <p class="col-xs-12">آیا نیاز به صحبت با ما دارید؟ آیا سؤال یا پیشنهادی دارید؟ لطفا با ما در مورد تمام سوالات  با استفاده از فرم زیر تماس بگیرید.</p>
                    <!-- Contact Form Starts -->

                    <form class="form-contact" method="post" action="{{ url('contact') }}">
                        {{ csrf_field() }}
                        <!-- Input Field Starts -->
                        <div class="form-group col-md-6">
                            <input class="form-control" name="fname" id="firstname" placeholder="نام " type="text" required>
                        </div>
                        <!-- Input Field Ends -->
                        <!-- Input Field Starts -->
                        <div class="form-group col-md-6">
                            <input class="form-control" name="lname" id="lastname" placeholder="نام خانوادگی" type="text" required>
                        </div>
                        <!-- Input Field Ends -->
                        <!-- Input Field Starts -->
                        <div class="form-group col-md-6">
                            <input class="form-control" name="email" id="email" placeholder="ایمیل" type="email" required>
                        </div>
                        <!-- Input Field Ends -->
                        <!-- Input Field Starts -->
                        <div class="form-group col-md-6">
                            <input class="form-control" name="subject" id="subject" placeholder="موضوع" type="text" required>
                        </div>
                        <!-- Input Field Ends -->
                        <!-- Input Field Starts -->
                        <div class="form-group col-xs-12">
                            <textarea class="form-control" id="message" name="message" placeholder="پیام" required></textarea>
                        </div>
                        <!-- Input Field Ends -->
                        <!-- Submit Form Button Starts -->
                        <div class="form-group col-xs-12 col-sm-4">
                            <button class="btn btn-primary btn-contact" type="submit">ارسال</button>
                        </div>
                        <!-- Submit Form Button Ends -->
                        <!-- Form Submit Message Starts -->
                        <div class="col-xs-12 text-center output_message_holder d-none">
                            <p class="output_message"></p>
                        </div>
                        <!-- Form Submit Message Ends -->
                    </form>
                    <!-- Contact Form Ends -->
                </div>
                <!-- Contact Widget Starts -->
                <div class="col-xs-12 col-md-4">
                    <div class="widget">
                        <div class="contact-page-info">
                            <!-- Contact Info Box Starts -->
                            <div class="contact-info-box">
                                <i class="fa fa-home big-icon"></i>
                                <div class="contact-info-box-content">
                                    <h4>آدرس</h4>
                                    <p>{{ $setting->address }}</p>
                                </div>
                            </div>
                            <!-- Contact Info Box Ends -->
                            <!-- Contact Info Box Starts -->
                            <div class="contact-info-box">
                                <i class="fa fa-phone big-icon"></i>
                                <div class="contact-info-box-content">
                                    <h4>شماره تلفن </h4>
                                    <p>{{ $setting->phone }}</p>
                                </div>
                            </div>
                            <!-- Contact Info Box Ends -->
                            <!-- Contact Info Box Starts -->
                            <div class="contact-info-box">
                                <i class="fa fa-envelope big-icon"></i>
                                <div class="contact-info-box-content">
                                    <h4>آدرس ایمیل</h4>

                                    <p>{{ $setting->email }}</p>
                                </div>
                            </div>
                            <!-- Contact Info Box Ends -->
                            <!-- Social Media Icons Starts -->
                            <div class="contact-info-box">
                                <i class="fa fa-share-alt big-icon"></i>
                                <div class="contact-info-box-content">
                                    <h4>شبکه های اجتماعی</h4>
                                    <div class="social-contact">
                                        <ul>
                                            <li class="facebook"><a href="{{ $setting->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                            <li class="twitter"><a href="{{ $setting->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                            <li class="google-plus"><a href="{{ $setting->instagram }}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                            <li class="twitter"><a href="{{ $setting->telegram }}" target="_blank"><i class="fa fa-telegram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Social Media Icons Starts -->
                        </div>
                    </div>
                </div>
                <!-- Contact Widget Ends -->
            </div>
        </div>
    </section>

@endsection
