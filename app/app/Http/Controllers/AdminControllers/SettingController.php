<?php

namespace App\Http\Controllers\AdminControllers;
use App\Http\Controllers\Controller;
use App\ImagesSetting;
use App\lib\Jdf;
use App\MainSetting;
use App\Menu;
use App\PageSetting;

use App\SectionFiveSetting;
use App\SectionFourSetting;
use App\SectionSecOneSetting;
use App\SectionThreeSetting;
use App\SectionTwoSetting;
use App\SingleSetting;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{

public function main()
{


    if(Gate::allows('view-setting')) {

        $main = MainSetting::first();
        $setting = SingleSetting::first();
        $logos = ImagesSetting::first();
        $section2 = SectionTwoSetting::first();
        $section_sec_one = SectionSecOneSetting::first();
        $section3 = SectionThreeSetting::first();
    $section4  = SectionFourSetting::first();
    $section5  = SectionFiveSetting::first();

    $menu = Menu::where('status',1)->pluck('title','url');
    $connect  = array();

    foreach ($menu as $key=>$value)
    {
        $connect[$key] = $value;
    }
    $connect['contact-us'] = 'تماس با ما';
    $connect['faq'] = 'سوالات متداول';
    $connect['services'] = 'خدمات';
    $connect['register'] = 'ثبت نام';
    $connect['login'] = 'ورود';

        return View('admin.setting.main', ['section_sec_one'=>$section_sec_one,'row' => $main, 'row2' => $setting, 'row3' => $logos,'connect'=>$connect,'section2'=>$section2,'section_three'=>$section3,'section4'=>$section4,'section5'=>$section5]);
    }else{
        return redirect('adm-panel/dashboard');
    }



}
    public function post_main(Request $request,$id)
    {
        $main = MainSetting::find($id);
        $main->fill($request->all());
        if($main->update())
        {
            return redirect('adm-panel/settings/main')->with('save','اطلاعات با موفقیت ذخیره گردید.');
        }else{
            return redirect('adm-panel/settings/main')->with('not_save','در درج اطلاعات مشکلی به موجود آمده است . مجددا تلاش فرمایید');
        }
    }
    public function post_single(Request $request,$id)
    {
        $main = SingleSetting::find($id);
        $main->fill($request->all());
        if($main->update())
        {
            return redirect('adm-panel/settings/main')->with('save','اطلاعات با موفقیت ذخیره گردید.');
        }else{
            return redirect('adm-panel/settings/main')->with('not_save','در درج اطلاعات مشکلی به موجود آمده است . مجددا تلاش فرمایید');
        }
    }


    public function post_section_two(Request $request,$id)
    {
        $main = SectionTwoSetting::find($id);
        $main->fill($request->all());
        if($main->update())
        {
            return redirect('adm-panel/settings/main')->with('save','اطلاعات با موفقیت ذخیره گردید.');
        }else{
            return redirect('adm-panel/settings/main')->with('not_save','در درج اطلاعات مشکلی به موجود آمده است . مجددا تلاش فرمایید');
        }
    }
    public function post_section_sec_one(Request $request,$id)
    {
        $main = SectionSecOneSetting::find($id);
        $main->fill($request->all());
        if($request->hasFile('img'))
        {
            $file  = time().rand(1,5). '.' .
                $request->file('img')->getClientOriginalExtension();
            $main->img = $file;
            $request->file('img')->move(
                base_path() . '/resources/upload/logos/',$file
            );
        }
        if($main->update())
        {
            return redirect('adm-panel/settings/main')->with('save','اطلاعات با موفقیت ذخیره گردید.');
        }else{
            return redirect('adm-panel/settings/main')->with('not_save','در درج اطلاعات مشکلی به موجود آمده است . مجددا تلاش فرمایید');
        }
    }

    public function post_section_three(Request $request,$id)
    {
        $main = SectionThreeSetting::find($id);
        $main->fill($request->all());


        if($request->hasFile('icon_one'))
        {
            $file  = time().rand(1,5). '.' .
                $request->file('icon_one')->getClientOriginalExtension();
            $main->icon_one = $file;
            $request->file('icon_one')->move(
                base_path() . '/resources/upload/section3/',$file
            );
        }

        if($request->hasFile('icon_two'))
        {
            $file  = time().rand(1,5). '.' .
                $request->file('icon_two')->getClientOriginalExtension();
            $main->icon_two = $file;
            $request->file('icon_two')->move(
                base_path() . '/resources/upload/section3/',$file
            );
        }

        if($request->hasFile('icon_three'))
        {
            $file  = time().rand(1,5). '.' .
                $request->file('icon_three')->getClientOriginalExtension();
            $main->icon_three = $file;
            $request->file('icon_three')->move(
                base_path() . '/resources/upload/section3/',$file
            );
        }

        if($main->update())
        {
            return redirect('adm-panel/settings/main')->with('save','اطلاعات با موفقیت ذخیره گردید.');
        }else{
            return redirect('adm-panel/settings/main')->with('not_save','در درج اطلاعات مشکلی به موجود آمده است . مجددا تلاش فرمایید');
        }
    }




    public function post_section_four(Request $request,$id)
    {
        $main = SectionFourSetting::find($id);
        $main->fill($request->all());
        if($main->update())
        {
            return redirect('adm-panel/settings/main')->with('save','اطلاعات با موفقیت ذخیره گردید.');
        }else{
            return redirect('adm-panel/settings/main')->with('not_save','در درج اطلاعات مشکلی به موجود آمده است . مجددا تلاش فرمایید');
        }
    }


    public function post_section_five(Request $request,$id)
    {
        $main = SectionFiveSetting::find($id);
        $main->fill($request->all());
        if($main->update())
        {
            return redirect('adm-panel/settings/main')->with('save','اطلاعات با موفقیت ذخیره گردید.');
        }else{
            return redirect('adm-panel/settings/main')->with('not_save','در درج اطلاعات مشکلی به موجود آمده است . مجددا تلاش فرمایید');
        }
    }



    public function post_images(Request $request,$id)
    {
        $main = ImagesSetting::find($id);
        $main->fill($request->all());

        if($request->hasFile('logo'))
        {
            $file  = time().rand(1,5). '.' .
                $request->file('logo')->getClientOriginalExtension();
            $main->logo = $file;
            $request->file('logo')->move(
                base_path() . '/resources/upload/logos/',$file
            );
        }
        if($request->hasFile('page'))
        {
            $file  = time().rand(1,5). '.' .
                $request->file('page')->getClientOriginalExtension();
            $main->page = $file;
            $request->file('page')->move(
                base_path() . '/resources/upload/logos/',$file
            );
        }

        if($request->hasFile('footer'))
        {
            $file  = time().rand(1,5). '.' .
                $request->file('footer')->getClientOriginalExtension();
            $main->footer = $file;
            $request->file('footer')->move(
                base_path() . '/resources/upload/logos/',$file
            );
        }
        if($request->hasFile('services'))
        {
            $file  = time().rand(1,5). '.' .
                $request->file('services')->getClientOriginalExtension();
            $main->services = $file;
            $request->file('services')->move(
                base_path() . '/resources/upload/logos/',$file
            );
        }


        if($request->hasFile('about'))
        {
            $file  = time().rand(1,5). '.' .
                $request->file('about')->getClientOriginalExtension();
            $main->about = $file;
            $request->file('about')->move(
                base_path() . '/resources/upload/logos/',$file
            );
        }

        if($request->hasFile('favicon'))
        {
            $file  = time().rand(1,5). '.' .
                $request->file('favicon')->getClientOriginalExtension();
            $main->favicon = $file;
            $request->file('favicon')->move(
                base_path() . '/resources/upload/logos/',$file
            );
        }


        if($main->update())
        {
            return redirect('adm-panel/settings/main')->with('save','اطلاعات با موفقیت ذخیره گردید.');
        }else{
            return redirect('adm-panel/settings/main')->with('not_save','در درج اطلاعات مشکلی به موجود آمده است . مجددا تلاش فرمایید');
        }
    }




}
