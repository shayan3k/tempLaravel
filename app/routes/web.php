<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::prefix("adm-panel")->group(function () {
    Route::group(['middleware'=>'admin'],function() {

        Route::get('dashboard','AdminControllers\AdminController@dashboard');

        Route::resource('slider','AdminControllers\SliderController',['except'=>['show']]);
        Route::resource('news','AdminControllers\NewsController',['except'=>['show']]);
        Route::post('ajax/upload','AdminControllers\AdminController@upload_img');
        Route::resource('services','AdminControllers\ServicesController',['except'=>['show']]);
        Route::resource('experts','AdminControllers\ExpertsController',['except'=>['show']]);
        Route::resource('question','AdminControllers\QuestionController',['except'=>['show']]);
        Route::resource('users','AdminControllers\UsersController',['except'=>['show']]);
        Route::get('users/verify/{id}','AdminControllers\UsersController@verify');
        Route::get('users/access/{id}','AdminControllers\UsersController@access');
        Route::put('users/access/{id}','AdminControllers\UsersController@access_post');
        Route::get('users/wallet/{id}','AdminControllers\UsersController@wallet');
        Route::post('users/wallet/{id}','AdminControllers\UsersController@wallet_post');
         Route::get('users/excel','AdminControllers\UsersController@excel');
        Route::get('profile','AdminControllers\UsersController@profile');
          Route::put('profile','AdminControllers\UsersController@profile_post');
        Route::resource('coin','AdminControllers\CoinController',['except'=>['show']]);

        Route::resource('pages','AdminControllers\PagesController');
        Route::delete('remove/pages','AdminControllers\PagesController@delete');

        Route::resource('menu','AdminControllers\MenuController');
        Route::delete('remove/menu','AdminControllers\MenuController@delete');
        Route::get('menu/sort/list','AdminControllers\MenuController@sort');
        Route::post('menu/sort/list','AdminControllers\MenuController@sort_post');
        Route::get('menu/status/{id}/{status}','AdminControllers\MenuController@status');

        /* Setting Website Routes */
        Route::get('settings/main','AdminControllers\SettingController@main');
        Route::put('settings/main/{id}','AdminControllers\SettingController@post_main');
        Route::put('settings/single/{id}','AdminControllers\SettingController@post_single');
        Route::put('settings/section_two/{id}','AdminControllers\SettingController@post_section_two');
        Route::put('settings/section_sec_one/{id}','AdminControllers\SettingController@post_section_sec_one');
        Route::put('settings/section_three/{id}','AdminControllers\SettingController@post_section_three');
        Route::put('settings/section_four/{id}','AdminControllers\SettingController@post_section_four');
        Route::put('settings/section_five/{id}','AdminControllers\SettingController@post_section_five');
        Route::put('settings/images/{id}','AdminControllers\SettingController@post_images');
        Route::put('settings/plan/{id}','AdminControllers\SettingController@post_plan');
        Route::put('settings/repair/{id}','AdminControllers\SettingController@post_repair');
        Route::put('settings/page/{id}','AdminControllers\SettingController@post_page');
        Route::get('statistics','AdminControllers\StatisticsController@index');


    });
    });





Route::get('adm-panel/login','Auth\LoginController@showLoginAdminForm');
Route::get('login','Auth\LoginController@showLoginForm');
Route::get('register','SiteController@register');
Route::post('register','SiteController@RegistrationPost');
Route::post('verify','SiteController@verify');
Route::get('forget-password','SiteController@forget');
Route::post('forget-password','SiteController@forget_post');
Route::get('/logout','Auth\LoginController@logout');
Route::post('login','Auth\LoginController@login');
Route::get('/','SiteController@index');
Route::get('faq','SiteController@faq');
Route::get('services','SiteController@services');
Route::get('profile/wallet','SiteController@wallet');
Route::post('profile/code','SiteController@code');
Route::get('news','SiteController@news');
Route::get('contact','SiteController@contact');
Route::post('contact','SiteController@contact_post');
Route::get('news/{url}','SiteController@news_show');
Route::get('{url}','SiteController@page');










