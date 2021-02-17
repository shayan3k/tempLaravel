<?php

namespace App\Http\Controllers\AdminControllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequest;
use App\Http\Requests\PagesRequest;
use App\lib\Jdf;
use App\Menu;
use App\Pages;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MenuController extends Controller
{

   public function index()
   {
       if(Gate::allows('view-menu')) {
    $menu = Menu::orderBy('position','asc')->get();
    return View('admin.menu.index',['menu'=>$menu]);
       }else{
           return redirect('adm-panel/dashboard');
       }
   }


public function create()
{
    if(Gate::allows('add-menu')) {
    $p = Pages::get();
    $pages = array();
    $pages[0] = 'انتخاب کنید';
    foreach($p as $key=>$value)
    {
        $pages[$value->id] = $value->title;
    }
    return View('admin.menu.create',['pages'=>$pages]);
    }else{
        return redirect('adm-panel/dashboard');
    }
}


    public function store(MenuRequest $request)
    {
       $type = $request->get('type_menu');
       $menu = new Menu($request->all());
        $menu->blink  = ($request->has('blink')) ? $request->get('blink') : 0;
       if($type==1)
       {
           $message = [
               'page_id.required'=>'برگه مورد نظر را انتخاب کنید',
                'page_id.not_in'  => 'برگه مورد نظر را انتخاب کنید',
           ];
           $this->validate($request, [
               'page_id' => 'required|not_in:0',
           ],$message);

           $title = str_replace('-','',$menu->title);
           $menu->url = preg_replace('/\s+/','-',$title);
       }
        if($type==2)
        {
            $message = [
                'link.required'=>'لینک خارجی نمی تواند خالی باشد',

            ];
            $this->validate($request, [
                'link' => 'required',
            ],$message);


        }

        if($menu->save())
        {
            alert()->success('منو مورد نظر با موفقیت ثبت گردید', 'ثبت اطلاعات');
            return redirect()->to(Config::get('global.url').'menu');

        }else{

            alert()->error('لطفا مجددا تلاش فرمایید', 'خطا اطلاعات');
            return redirect()->back();
        }


    }



    public function edit($id)
    {
        if(Gate::allows('edit-menu')) {
        $p = Pages::get();
        $pages = array();
        $pages[0] = 'انتخاب کنید';
        foreach($p as $key=>$value)
        {
            $pages[$value->id] = $value->title;
        }
        $row = Menu::find($id);
        if($row){
            return View('admin.menu.update',['row'=>$row,'pages'=>$pages]);
        }else{
            return redirect()->back();
        }
        }else{
            return redirect()->back();
        }
    }



public function update(MenuRequest $request,$id)
{

    $type = $request->get('type_menu');




    $menu = Menu::find($id);
    $menu->fill($request->all());

    $menu->blink  = ($request->has('blink')) ? $request->get('blink') : 0;

    if($type==1)
    {
        $message = [
            'page_id.required'=>'برگه مورد نظر را انتخاب کنید',
            'page_id.not_in'  => 'برگه مورد نظر را انتخاب کنید',
        ];
        $this->validate($request, [
            'page_id' => 'required|not_in:0',
        ],$message);


        $title = str_replace('-','',$menu->title);
        $menu->url = preg_replace('/\s+/','-',$title);
    }
    if($type==2)
    {
        $message = [
            'link.required'=>'لینک خارجی نمی تواند خالی باشد',

        ];
        $this->validate($request, [
            'link' => 'required',
        ],$message);


    }



    if($menu->update())
    {
        alert()->success('منو مورد نظر با موفقیت ویرایش گردید', 'ویرایش اطلاعات');
        return redirect()->to(Config::get('global.url').'menu');

    }else{

        alert()->error('لطفا مجددا تلاش فرمایید', 'خطا اطلاعات');
        return redirect()->back();
    }
}







    public function delete(Request $request)
    {


            $menu_id = $request->get('menu_id');
            Menu::find($menu_id)->delete();
        alert()->success('منو مورد نظر با موفقیت حذف گردید', 'حذف اطلاعات');
        return redirect()->back();

    }






    public function sort()
    {
            $menu = Menu::orderBy('position', 'asc')->get();
            return View('admin.menu.sort', ['menu' => $menu]);
    }
    public function sort_post(Request $request)
    {
        $i=1;
        foreach($request->get('sort') as $key=>$value)
        {
            Menu::where('id',$key)->update(['position'=>$i]);
            $i++;
        }
        alert()->success('منو مورد نظر با موفقیت سورت گردید', 'ویرایش اطلاعات');
        return redirect()->to(Config::get('global.url').'menu');
    }


public function status($id,$status)
{
    $menu = Menu::findOrFail($id);
    $menu->update(['status'=>$status]);
    return redirect()->back();
}



}
