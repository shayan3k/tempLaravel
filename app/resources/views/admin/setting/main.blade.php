@extends('layouts.admin')
<?php
$jdf = new \App\lib\Jdf();
?>
@section('content')
<style>
a.pcalBtn {
    margin: 0 10px 18px 30px;
}
</style>
<div class="row-fluid">
            <div class="span12">

                <h3 class="page-title">
                   پنل مدیریت وب سایت
                            <small>تنظیمات سایت</small>
                </h3>
                <ul class="breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="{{ url('adm-panel/dashboard') }}">پیشخوان</a>
                        <i class="fa fa-angle-left"></i>

                    </li>

                      <li>

                    <a href="{{ Request::url()}}">تنظیمات کلی وب سایت</a>


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
@if(Session::has('save'))
<div class="alert alert-success" role="alert">
{{ Session::get('save') }}
</div>
@endif
@if(Session::has('not_save'))
<div class="alert alert-success" role="alert">
{{ Session::get('not_save') }}
</div>
@endif
<div class="tabbable tabbable-custom">
					<ul class="nav nav-tabs">
	<li class="active"><a href="#tab_1_1" data-toggle="tab"> تنظیمات کلی سایت </a></li>
	<li><a href="#tab_1_2" data-toggle="tab" id="tab2">  تنظیم مشخصات فردی سایت  </a></li>
	<li><a href="#tab_1_3" data-toggle="tab" id="tab2">تنظیمات بخش درباره ما </a></li>
    <li><a href="#tab_1_8" data-toggle="tab" id="tab2">تنظیمات سکشن شماره اول </a></li>
	<li><a href="#tab_1_4" data-toggle="tab" id="tab2">تنظیمات بخش زیر اسلایدر </a></li>
	<li><a href="#tab_1_5" data-toggle="tab" id="tab2">تنظیمات بخش کارشناسان و اخبار </a></li>
	<li><a href="#tab_1_6" data-toggle="tab" id="tab2">تنظیمات بخش بالای فوتر </a></li>
	<li><a href="#tab_1_7" data-toggle="tab" id="tab3">  لوگو و تصاویر  </a></li>
					</ul>

					<div class="tab-content">

		<!--=================================================
												TAB 1
										============================================-->

						<div class="tab-pane active" id="tab_1_1">
							<div class="row-fluid">
								<div class="span12">
									<div class="portlet box blue">
										<div class="portlet-title">
											<div class="caption"><i class="fa fa-cogs"></i>تنظیمات کلی سایت</div>

										</div>
										<div class="portlet-body form">
				  {!! Form::model($row,['method'=>'PUT','url'=>['adm-panel/settings/main',$row['id']],'class'=>'form-horizontal']) !!}

												<h5 class="form-section size-18"> <i class="fa fa-envelope"></i> تنظیمات ارسال ایمیل </h5>
												<div class="next-line"></div>

												<div class="control-group">
													<label for="MAIL_HOST" class="control-label size-13">سرویس دهنده ایمیل</label>
													<div class="controls">
														<div class="input-icon left">
															<i class="fa fa-envelope"></i>
															<input class="m-wrap ltr" type="text" name="service_email" id="MAIL_HOST" value="{{ $row->service_email }}">
															<span class="help-inline form-alert"> مثال : mail.mysite.com </span>
														</div>
													</div>
												</div>

												<div class="control-group">
													<label for="MAIL_PORT" class="control-label size-13"> درگاه ارسال ایمیل (port) </label>
													<div class="controls">
														<div class="input-icon left">
															<i class="fa fa-envelope"></i>
															<input class="m-wrap ltr small digits" type="text" name="port_email" id="MAIL_PORT" value="{{ $row->port_email }}">
														</div>
													</div>
												</div>

												<div class="control-group">
													<label for="MAIL_USERNAME" class="control-label size-13">نام کاربری سرویس ایمیل </label>
													<div class="controls">
														<div class="input-icon left">
															<i class="fa fa-envelope"></i>
															<input class="m-wrap ltr" type="text" name="username_email" id="MAIL_USERNAME" value="{{ $row->username_email }}">
														</div>
													</div>
												</div>

												<div class="control-group">
													<label for="MAIL_PASSWORD" class="control-label size-13">رمز عبور سرویس ایمیل </label>
													<div class="controls">
														<div class="input-icon left">
															<i class="fa fa-envelope"></i>
															<input class="m-wrap ltr" type="password" name="password_email" id="MAIL_PASSWORD" value="{{ $row->password_email }}">
														</div>
													</div>
												</div>



												<div class="next-line"></div>
												<h5 class="form-section size-18"><i class="fa fa-envelope"></i> تنظیمات ارسال پیامک </h5>

												<div class="control-group">
													<label for="SITE_SMS_NUMBER" class="control-label size-13">شماره اختصاصی ارسال پیامک</label>
													<div class="controls">
														<div class="input-icon left">
															<i class="fa fa-envelope"></i>
															<input class="m-wrap ltr" type="text" name="num_sms" id="SITE_SMS_NUMBER" value="{{ $row->num_sms }}">
															<span class="help-inline form-alert"> به عنون مثال : 3000246484 </span>
														</div>
													</div>
												</div>

												<div class="control-group">
													<label for="SMS_USERNAME" class="control-label size-13">نام کاربری پنل پیامکی</label>
													<div class="controls">
														<div class="input-icon left">
															<i class="fa fa-envelope"></i>
															<input class="m-wrap ltr" type="text" name="username_sms" id="SMS_USERNAME" value="{{ $row->username_sms }}">
															<span class="help-inline form-alert"> </span>
														</div>
													</div>
												</div>

												<div class="control-group">
													<label for="SMS_PASSWORD" class="control-label size-13">رمز عبور پنل پیامکی</label>
													<div class="controls">
														<div class="input-icon left">
															<i class="fa fa-envelope"></i>
															<input class="m-wrap ltr" type="password" name="password_sms" id="SMS_PASSWORD" value="{{ $row->password_sms }}">
															<span class="help-inline form-alert"> </span>
														</div>
													</div>
												</div>




												<div class="form-actions">

													<button type="submit" class="btn green" id="userAdd_submit"> <i class="fa fa-save"></i> ذخیره کردن تغییرات </button>
												</div>

										{{ Form::close() }}
										</div>
									</div>
								</div>
							</div>
						</div>
		<!--=================================================
												TAB 2
										============================================-->
						<div class="tab-pane" id="tab_1_2">
							<div class="row-fluid">
								<div class="span12">
									<div class="portlet box blue">
										<div class="portlet-title">
											<div class="caption"><i class="fa fa-cogs"></i>تنظیم مشخصات فردی سایت</div>

										</div>
										<div class="portlet-body form">
				  {!! Form::model($row2,['method'=>'PUT','url'=>['adm-panel/settings/single',$row2['id']],'class'=>'form-horizontal']) !!}
												<h3 class="form-section size-18">  </h3>



												<div class="control-group" id="userNameGroup">
													<label for="SITE_TITLE" class="control-label size-13">عنوان سایت</label>
													<div class="controls">
														<div class="input-icon left">
															<i class="fa fa-globe"></i>
															<input class="m-wrap rtl span12 size-13" name="title" id="SITE_TITLE" type="text" value="{{ $row2->title }}">
															<span class="help-inline form-alert"> </span>
														</div>
													</div>
												</div>


												<div class="control-group" id="passGroup">
													<label for="TEL1" class="control-label size-13"> شماره خط </label>
													<div class="controls">
														<div class="input-icon left">
															<i class="fa fa-headphones"></i>
															<input class="m-wrap ltr digits" type="text" name="phone" id="TEL1" value="{{ $row2->phone }}">
															<span class="help-inline form-alert"> </span>
														</div>
													</div>
												</div>
                                                <div class="control-group" id="passGroup">
													<label for="TEL1" class="control-label size-13"> آدرس</label>
													<div class="controls">
														<div class="input-icon left">
															<i class="fa fa-map-marker"></i>
															<input class="m-wrap  span12" type="text" name="address" id="TEL1" value="{{ $row2->address }}">
															<span class="help-inline form-alert"> </span>
														</div>
													</div>
												</div>

												<div class="control-group" id="repassGroup">
													<label for="EMAIL" class="control-label size-13"> ایمیل اصلی </label>
													<div class="controls">
														<div class="input-icon left">
															<i class="fa fa-envelope"></i>
															<input class="m-wrap ltr" type="text" name="email" id="EMAIL" value="{{ $row2->email }}">
															<span class="help-inline form-alert"></span>
														</div>
													</div>
												</div>



												<div class="control-group" id="repassGroup">
													<label for="USER_COPYRIGHT" class="control-label size-13">متن قسمت کپی رایت</label>
													<div class="controls">
														<div class="input-icon left">
															<i class="fa fa-map-marker"></i>
															<input class="m-wrap YEKAN size-13 span12" value="{{ $row2->copyright }}" type="text" name="copyright" id="USER_COPYRIGHT">
														</div>
													</div>
												</div>

<div class="next-line"></div>



<div class="control-group">
                                                <label for="about_fa" class="control-label size-13">تفاهم نامه ثبت نام</label>
                                                <div class="controls">
                                                    <textarea class="span12 m-wrap rtl size-13 ckeditor" id="editor2" name="terms" rows="6">{{ $row2->terms }}</textarea>
                                                </div>
                                            </div>
<div class="next-line"></div>









												<h5 class="form-section size-18"> تنظیمات سئو (بهینه سازی برای موتورهای جستجو) </h5>



												<div class="control-group" id="repassGroup">
													<label for="SEO_KEYWORDS" class="control-label size-13">کلمات کلیدی سایت</label>
													<div class="controls">
														<span class="help-inline form-alert"> کلمات مختلف را با علامت , ازهم جداکنید </span>
														<textarea class="span12 m-wrap rtl size-13" name="keywords" id="SEO_KEYWORDS" rows="4">{{ $row2->keywords }}</textarea>
													</div>
												</div>

												<div class="control-group">
													<label for="SEO_DESCRIPTION" class="control-label size-13"> توضیحات سایت برای موتورهای جستجو : </label>
													<div class="controls">
														<textarea class="span12 m-wrap rtl size-13" id="SEO_DESCRIPTION" name="desc" rows="6">{{ $row2->desc }}</textarea>
													</div>
												</div>

												<h5 class="form-section size-18"> شبکه های اجتماعی </h5>

												<div class="control-group">
													<label for="FACEBOOK_URL" class="control-label size-13">آدرس Facebook</label>
													<div class="controls">
														<div class="input-icon left">
															<i class="icon-facebook"></i>
															<input class="m-wrap ltr large" type="text" name="facebook" id="FACEBOOK_URL" value="{{ $row2->facebook }}">
															<span class="help-inline form-alert"> مثال: http://www.facebook.com/site </span>
														</div>
													</div>
												</div>

												<div class="control-group">
													<label for="TWITTER_URL" class="control-label size-13">آدرس Twitter</label>
													<div class="controls">
														<div class="input-icon left">
															<i class="icon-twitter"></i>
															<input class="m-wrap ltr large" type="text" name="twitter" id="TWITTER_URL" value="{{ $row2->twitter }}">
														</div>
													</div>
												</div>



												<div class="control-group">
													<label for="INSTAGRAM_URL" class="control-label size-13">آدرس Instagram</label>
													<div class="controls">
														<div class="input-icon left">
															<i class="icon-instagram"></i>
															<input class="m-wrap ltr large" type="text" name="instagram" id="INSTAGRAM_URL" value="{{ $row2->instagram }}">
														</div>
													</div>
												</div>



												<div class="control-group">
													<label for="TELEGRAM_URL" class="control-label size-13">آدرس telegram</label>
													<div class="controls">
														<div class="input-icon left">
															<i class="icon-pinterest"></i>
															<input class="m-wrap ltr large" type="text" name="telegram" id="TELEGRAM_URL" value="{{ $row2->telegram }}">
														</div>
													</div>
												</div>



												<div class="form-actions">
													<input type="hidden" name="tab_num" value="2">
													<button type="submit" class="btn green" id="userAdd_submit"><i class="fa fa-save"> </i> ذخیره کردن تغییرات</button>
												</div>

											{{ Form::close()}}
										</div>
									</div>
								</div>
							</div>
						</div>
		<!--=================================================


<!---------- Tab 3 ------------------ -->

		<div class="tab-pane" id="tab_1_3">
							<div class="row-fluid">
								<div class="span12">
									<div class="portlet box blue">
										<div class="portlet-title">
											<div class="caption"><i class="fa fa-cogs"></i>تنظیم بخش درباره ما</div>

										</div>
										<div class="portlet-body form">
				  {!! Form::model($section2,['method'=>'PUT','url'=>['adm-panel/settings/section_two',$section2['id']],'class'=>'form-horizontal']) !!}
												<h3 class="form-section size-18">  </h3>

<div class="control-group" id="repassGroup">
													<label for="USER_COPYRIGHT" class="control-label size-13">متن  زیر قسمت درباره ما</label>
													<div class="controls">
														<div class="input-icon left">
															<i class="fa fa-edit"></i>
															<input class="m-wrap YEKAN size-13 span12" value="{{ $section2->txt_one }}" type="text" name="txt_one" id="USER_COPYRIGHT">
														</div>
													</div>
												</div>



												<div class="control-group">
                                                <label for="SEO_DESCRIPTION" class="control-label size-13">توضیحات </label>
                                                <div class="controls">
                                                    <textarea class="span12 m-wrap rtl size-13 ckeditor" id="editor1" name="desc_two" rows="6">{{ $section2->desc_two }}</textarea>
                                                </div>
                                            </div>

	                                    <div class="control-group" id="repassGroup">
                                                <label for="USER_COPYRIGHT" class="control-label size-13">متن دکمه</label>
                                                <div class="controls">
                                                    <div class="input-icon left">
                                                        <i class="fa fa-edit"></i>
                                                        <input class="m-wrap YEKAN size-13 span3" value="{{ $section2->btn_val }}" type="text" name="btn_val" id="USER_COPYRIGHT">
                                                    </div>
                                                </div>
                                            </div>


                                         <div class="control-group">
                                                    <label class="control-label size-13" for="category_id">اتصال به </label>
                                                    <div class="controls">
                                                             {!! form::select('connect_two',$connect,null,['class'=>'form-control m-wrap span5'])  !!}
                                                    </div>
                                                    <div class="help-block"></div>
                                                </div>






												<div class="form-actions">
													<input type="hidden" name="tab_num" value="2">
													<button type="submit" class="btn green" id="userAdd_submit"><i class="fa fa-save"> </i> ذخیره کردن تغییرات</button>
												</div>

											{{ Form::close()}}
										</div>
									</div>
								</div>
							</div>
						</div>



      <div class="tab-pane" id="tab_1_8">
                            <div class="row-fluid">
                                <div class="span12">
                                    <div class="portlet box blue">
                                        <div class="portlet-title">
                                            <div class="caption"><i class="fa fa-cogs"></i>تنظیم سکشن شماره اول</div>

                                        </div>
                                        <div class="portlet-body form">
                                            {!! Form::model($section_sec_one,['method'=>'PUT','files'=>true,'url'=>['adm-panel/settings/section_sec_one',$section_sec_one['id']],'class'=>'form-horizontal']) !!}
                                            <h3 class="form-section size-18">  </h3>


                                            <div class="control-group" id="repassGroup">
                                                <label for="USER_COPYRIGHT" class="control-label size-13">عنوانک</label>
                                                <div class="controls">
                                                    <div class="input-icon left">
                                                        <i class="fa fa-edit"></i>
                                                        <input class="m-wrap YEKAN size-13 span12" value="{{ $section_sec_one->txt_title }}" type="text" name="txt_title" id="USER_COPYRIGHT">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="control-group" id="repassGroup">
                                                <label for="USER_COPYRIGHT" class="control-label size-13">متن  زیر قسمت سکشن</label>
                                                <div class="controls">
                                                    <div class="input-icon left">
                                                        <i class="fa fa-edit"></i>
                                                        <input class="m-wrap YEKAN size-13 span12" value="{{ $section_sec_one->txt_one }}" type="text" name="txt_one" id="USER_COPYRIGHT">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="control-group" id="repassGroup">
                                                <label for="USER_COPYRIGHT" class="control-label size-13">آپلود تصویر</label>
                                                <div class="controls">
                                                    <div class="input-icon left">
                                                        <i class="fa fa-edit"></i>
                                                        <input class="m-wrap YEKAN size-13 span12"  type="file" name="img" id="USER_COPYRIGHT">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label for="SEO_DESCRIPTION" class="control-label size-13">توضیحات </label>
                                                <div class="controls">
                                                    <textarea class="span12 m-wrap rtl size-13 ckeditor" id="editor5" name="desc_two" rows="6">{{ $section_sec_one->desc_two }}</textarea>
                                                </div>
                                            </div>

                                            <div class="control-group" id="repassGroup">
                                                <label for="USER_COPYRIGHT" class="control-label size-13">متن دکمه</label>
                                                <div class="controls">
                                                    <div class="input-icon left">
                                                        <i class="fa fa-edit"></i>
                                                        <input class="m-wrap YEKAN size-13 span3" value="{{ $section_sec_one->btn_val }}" type="text" name="btn_val" id="USER_COPYRIGHT">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="control-group">
                                                <label class="control-label size-13" for="category_id">اتصال به </label>
                                                <div class="controls">
                                                    {!! form::select('connect_two',$connect,null,['class'=>'form-control m-wrap span5'])  !!}
                                                </div>
                                                <div class="help-block"></div>
                                            </div>






                                            <div class="form-actions">
                                                <input type="hidden" name="tab_num" value="2">
                                                <button type="submit" class="btn green" id="userAdd_submit"><i class="fa fa-save"> </i> ذخیره کردن تغییرات</button>
                                            </div>

                                            {{ Form::close()}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

<!--           Tab 4     -->


		<div class="tab-pane" id="tab_1_4">
							<div class="row-fluid">
								<div class="span12">
									<div class="portlet box blue">
										<div class="portlet-title">
											<div class="caption"><i class="fa fa-cogs"></i>تنظیمات بخش زیر اسلایدر </div>

										</div>
										<div class="portlet-body form">
				  {!! Form::model($section_three,['method'=>'PUT','files'=>true,'url'=>['adm-panel/settings/section_three',$section_three['id']],'class'=>'form-horizontal']) !!}
												<h3 class="form-section size-18">  </h3>


                             <div class="control-group" id="repassGroup">
                                <label for="USER_COPYRIGHT" class="control-label size-13">آیکون اول</label>
                                <div class="controls">
                                    <div class="input-icon left">
                                        <i class="fa fa-map-marker"></i>
                                        <input dir="ltr" class="m-wrap YEKAN size-13 span4"  type="file" name="icon_one" id="USER_COPYRIGHT">
                                    </div>
                                </div>

                            </div>


                        <div class="control-group" id="repassGroup">
                        <label for="USER_COPYRIGHT" class="control-label size-13">متن قسمت اول</label>
                        <div class="controls">
                            <div class="input-icon left">
                                <i class="fa fa-map-marker"></i>
                                <input class="m-wrap YEKAN size-13 span12" value="{{ $section_three->txt_one }}" type="text" name="txt_one" id="USER_COPYRIGHT">
                            </div>
                        </div>
                    </div>



                        	<div class="control-group">
                        <label for="SEO_DESCRIPTION" class="control-label size-13">توضیحات قسمت اول</label>
                        <div class="controls">
                            <textarea class="span12 m-wrap rtl size-13" id="SEO_DESCRIPTION" name="desc_one" rows="6">{{ $section_three->desc_one }}</textarea>
                        </div>
                    </div>



<div class="next-line"></div>


     <div class="control-group" id="repassGroup">
                                <label for="USER_COPYRIGHT" class="control-label size-13">آیکون دوم</label>
                                <div class="controls">
                                    <div class="input-icon left">
                                        <i class="fa fa-map-marker"></i>
                                        <input dir="ltr" class="m-wrap YEKAN size-13 span4"  type="file" name="icon_two" id="USER_COPYRIGHT">
                                    </div>
                                </div>

                            </div>


                        <div class="control-group" id="repassGroup">
                        <label for="USER_COPYRIGHT" class="control-label size-13">متن قسمت دوم</label>
                        <div class="controls">
                            <div class="input-icon left">
                                <i class="fa fa-map-marker"></i>
                                <input class="m-wrap YEKAN size-13 span12" value="{{ $section_three->txt_two }}" type="text" name="txt_two" id="USER_COPYRIGHT">
                            </div>
                        </div>
                    </div>



                        	<div class="control-group">
                        <label for="SEO_DESCRIPTION" class="control-label size-13">توضیحات قسمت دوم</label>
                        <div class="controls">
                            <textarea class="span12 m-wrap rtl size-13" id="SEO_DESCRIPTION" name="desc_two" rows="6">{{ $section_three->desc_two }}</textarea>
                        </div>
                    </div>


<div class="next-line"></div>


     <div class="control-group" id="repassGroup">
                                <label for="USER_COPYRIGHT" class="control-label size-13">آیکون سوم</label>
                                <div class="controls">
                                    <div class="input-icon left">
                                        <i class="fa fa-map-marker"></i>
                                        <input dir="ltr" class="m-wrap YEKAN size-13 span4"  type="file" name="icon_three" id="USER_COPYRIGHT">
                                    </div>
                                </div>

                            </div>


                        <div class="control-group" id="repassGroup">
                        <label for="USER_COPYRIGHT" class="control-label size-13">متن قسمت سوم</label>
                        <div class="controls">
                            <div class="input-icon left">
                                <i class="fa fa-map-marker"></i>
                                <input class="m-wrap YEKAN size-13 span12" value="{{ $section_three->txt_three }}" type="text" name="txt_three" id="USER_COPYRIGHT">
                            </div>
                        </div>
                    </div>



                        	<div class="control-group">
                        <label for="SEO_DESCRIPTION" class="control-label size-13">توضیحات قسمت سوم</label>
                        <div class="controls">
                            <textarea class="span12 m-wrap rtl size-13" id="SEO_DESCRIPTION" name="desc_three" rows="6">{{ $section_three->desc_three }}</textarea>
                        </div>
                    </div>


												<div class="form-actions">
													<input type="hidden" name="tab_num" value="2">
													<button type="submit" class="btn green" id="userAdd_submit"><i class="fa fa-save"> </i> ذخیره کردن تغییرات</button>
												</div>

											{{ Form::close()}}
										</div>
									</div>
								</div>
							</div>
						</div>


								<!--	TAB 5
										============================================-->





<div class="tab-pane" id="tab_1_5">
							<div class="row-fluid">
								<div class="span12">
									<div class="portlet box blue">
										<div class="portlet-title">
											<div class="caption"><i class="fa fa-cogs"></i>تنظیمات کارشناسان و اخبار</div>

										</div>
										<div class="portlet-body form">
				  {!! Form::model($section4,['method'=>'PUT','url'=>['adm-panel/settings/section_four',$section4['id']],'class'=>'form-horizontal']) !!}
												<h3 class="form-section size-18">  </h3>

                                                    <div class="control-group" id="repassGroup">
													<label for="USER_COPYRIGHT" class="control-label size-13">عنوان زیر کارشناسان</label>
													<div class="controls">
														<div class="input-icon left">
															<i class="fa fa-edit"></i>
															<input class="m-wrap YEKAN size-13 span12" value="{{ $section4->txt_user }}" type="text" name="txt_user" id="USER_COPYRIGHT">
														</div>
													</div>
												</div>

                                            <div class="control-group" id="repassGroup">
                                                <label for="USER_COPYRIGHT" class="control-label size-13">عنوان زیر اخبار</label>
                                                <div class="controls">
                                                    <div class="input-icon left">
                                                        <i class="fa fa-edit"></i>
                                                        <input class="m-wrap YEKAN size-13 span12" value="{{ $section4->txt_news }}" type="text" name="txt_news" id="USER_COPYRIGHT">
                                                    </div>
                                                </div>
                                            </div>


												<div class="form-actions">
													<input type="hidden" name="tab_num" value="2">
													<button type="submit" class="btn green" id="userAdd_submit"><i class="fa fa-save"> </i> ذخیره کردن تغییرات</button>
												</div>

											{{ Form::close()}}
										</div>
									</div>
								</div>
							</div>
						</div>


<!-- Tab 6 -->


<div class="tab-pane" id="tab_1_6">
							<div class="row-fluid">
								<div class="span12">
									<div class="portlet box blue">
										<div class="portlet-title">
											<div class="caption"><i class="fa fa-cogs"></i>تنظیم مشخصات فردی سایت</div>

										</div>
										<div class="portlet-body form">
				  {!! Form::model($section5,['method'=>'PUT','url'=>['adm-panel/settings/section_five',$section5['id']],'class'=>'form-horizontal']) !!}
												<h3 class="form-section size-18">  </h3>

                                                <div class="control-group" id="repassGroup">
													<label for="USER_COPYRIGHT" class="control-label size-13">عنوان اول</label>
													<div class="controls">
														<div class="input-icon left">
															<i class="fa fa-edit"></i>
															<input class="m-wrap YEKAN size-13 span12" value="{{ $section5->txt_one }}" type="text" name="txt_one" id="USER_COPYRIGHT">
														</div>
													</div>
												</div>


                                            <div class="control-group" id="repassGroup">
                                                <label for="USER_COPYRIGHT" class="control-label size-13">عنوان دوم</label>
                                                <div class="controls">
                                                    <div class="input-icon left">
                                                        <i class="fa fa-edit"></i>
                                                        <input class="m-wrap YEKAN size-13 span12" value="{{ $section5->txt_two }}" type="text" name="txt_two" id="USER_COPYRIGHT">
                                                    </div>
                                                </div>
                                            </div>

	                                    <div class="control-group" id="repassGroup">
                                                <label for="USER_COPYRIGHT" class="control-label size-13">متن دکمه</label>
                                                <div class="controls">
                                                    <div class="input-icon left">
                                                        <i class="fa fa-edit"></i>
                                                        <input class="m-wrap YEKAN size-13 span3" value="{{ $section5->btn_val }}" type="text" name="btn_val" id="USER_COPYRIGHT">
                                                    </div>
                                                </div>
                                            </div>


                                         <div class="control-group">
                                                    <label class="control-label size-13" for="category_id">اتصال به </label>
                                                    <div class="controls">
                                                             {!! form::select('connect_five',$connect,null,['class'=>'form-control m-wrap span5'])  !!}
                                                    </div>
                                                    <div class="help-block"></div>
                                                </div>






												<div class="form-actions">
													<input type="hidden" name="tab_num" value="2">
													<button type="submit" class="btn green" id="userAdd_submit"><i class="fa fa-save"> </i> ذخیره کردن تغییرات</button>
												</div>

											{{ Form::close()}}
										</div>
									</div>
								</div>
							</div>
						</div>


<!-- tab 7 -->
						<div class="tab-pane" id="tab_1_7">
							<div class="row-fluid">
								<div class="span12">
									<div class="portlet box blue">
										<div class="portlet-title">
											<div class="caption"><i class="fa fa-cogs"></i> تصاویر سایت</div>

										</div>
										<div class="portlet-body form">
											  {!! Form::model($row3,['method'=>'PUT','url'=>['adm-panel/settings/images',$row3['id']],'class'=>'form-horizontal','files'=>true]) !!}



												<div class="control-group">
													<label class="control-label size-13 rtl " style="text-align:right"> لوگوی سایت <br>  </label>
													<div class="controls">
														<div class="fileupload fileupload-new" data-provides="fileupload">

															<div class="fileupload-new thumbnail" style="width: 50px;">
																<img src="{{ url('resources/upload/logos/'.$row3->logo)}}" alt="">

															</div>

															<div>
																<span class="btn btn-file"><span class="fileupload-new"> انتخاب تصویر </span>

																<input type="file" class="default" name="logo"></span>
															</div>
														</div>
													</div>
												</div>

	                                                <div class="control-group">
													<label class="control-label size-13 rtl " style="text-align:right"> تصویر درباره ما <br>  </label>
													<div class="controls">
														<div class="fileupload fileupload-new" data-provides="fileupload">

															<div class="fileupload-new thumbnail" style="width: 50px;">
																<img src="{{ url('resources/upload/logos/'.$row3->about)}}" alt="">

															</div>

															<div>
																<span class="btn btn-file"><span class="fileupload-new"> انتخاب تصویر </span>

																<input type="file" class="default" name="about"></span>
															</div>
														</div>
													</div>
												</div>



												<div class="control-group">
													<label class="control-label size-13 " style="text-align: right">تصویر خدمات<br></label>
													<div class="controls">
														<div class="fileupload fileupload-new" data-provides="fileupload">
															<div class="fileupload-new thumbnail" style="width: 50px;">
																<img src="{{ url('resources/upload/logos/'.$row3->services)}}" alt="">
															</div>
															<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 480px; line-height: 20px;"></div>
															<div>
																<span class="btn btn-file"><span class="fileupload-new"> انتخاب تصویر </span>
																<input type="file" class="default" name="services"></span>
															</div>
														</div>
													</div>
												</div>





												<div class="control-group">
													<label class="control-label size-13 rtl " style="text-align:right">تصویر بالای فوتر</label>
													<div class="controls">
														<div class="fileupload fileupload-new" data-provides="fileupload">
															<div class="fileupload-new thumbnail" style="width: 50px;">
																<img src="{{ url('resources/upload/logos/'.$row3->footer)}}" alt="">
															</div>
															<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 560px; line-height: 20px;"></div>
															<div>
																<span class="btn btn-file"><span class="fileupload-new"> انتخاب تصویر </span>

																<input type="file" class="default" name="footer"></span>
															</div>
														</div>
													</div>
												</div>


                                            <div class="control-group">
                                                <label class="control-label size-13 rtl " style="text-align:right">تصویر صفحات داخل</label>
                                                <div class="controls">
                                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                                        <div class="fileupload-new thumbnail" style="width: 50px;">
                                                            <img src="{{ url('resources/upload/logos/'.$row3->page)}}" alt="">
                                                        </div>
                                                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 560px; line-height: 20px;"></div>
                                                        <div>
																<span class="btn btn-file"><span class="fileupload-new"> انتخاب تصویر </span>

																<input type="file" class="default" name="page"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>




                                            <div class="control-group">
													<label class="control-label size-13 rtl " style="text-align:right"> تصویر FavIcon <br><br>  - <small> فرمت : Png <br> این آیکون در titlebar سایت نمایش داده می شود. بهتر است ابعاد این تصویر مربعی و حدود 200 در 200 پیکسل باشد </small></label>
													<div class="controls">
														<div class="fileupload fileupload-new" data-provides="fileupload">
															<div class="fileupload-new thumbnail" style="width: 48px; height: 48px;">
																<img src="{{ url('resources/upload/logos/'.$row3->favicon)}}" alt="">
															</div>
															<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 48px; max-height: 48px; line-height: 20px;"></div>
															<div>
																<span class="btn btn-file"><span class="fileupload-new"> انتخاب تصویر </span>
																<span class="fileupload-exists"> تغییر تصویر </span>
																<input type="file" class="default" name="favicon"></span>
															</div>
														</div>
													</div>
												</div>

												<div class="form-actions">


													<button type="submit" id="logo_send" class="btn green"> ثبت تغییرات </button>
												</div>

										{{ Form::close()}}



										</div>
									</div>
								</div>
							</div>
						</div>
		<!--=================================================
												TAB 4
										============================================-->


		<!--=================================================
												TAB 7
										============================================-->




					</div>
				</div>
@endsection

@section('header')
<link href="{{ url('resources/css/theme/uniform.default.css') }}" rel="stylesheet" type="text/css" media="screen"/>
<link href="{{ url('resources/css/theme/js-persian-cal.css') }}" rel="stylesheet" type="text/css" media="screen"/>
@endsection


@section('footer')
 <script type="text/javascript" src="{{ url('resources/ckeditor/ckeditor.js') }}"></script>
 <script type="text/javascript" src="{{ url('resources/js/theme/js-persian-cal.min.js') }}"></script>
<script>
$('#logo_send').click(function(e){
blockScreen();
});
</script>
   <script>
       var date = new AMIB.persianCalendar('date', 'REOPEN_DATE');
     </script>

<script>
CKEDITOR.replace( 'editor', {
    filebrowserUploadUrl: "{{ url('adm-panel/ajax/upload') }}"
} );
</script>

<script>
CKEDITOR.replace( 'editor2', {
    filebrowserUploadUrl: "{{ url('adm-panel/ajax/upload') }}"
} );
</script>
<script>
CKEDITOR.replace( 'editor1', {
    filebrowserUploadUrl: "{{ url('adm-panel/ajax/upload') }}"
} );
</script>
 <script>
     CKEDITOR.replace( 'editor5', {
         filebrowserUploadUrl: "{{ url('adm-panel/ajax/upload') }}"
     } );
 </script>
@endsection
