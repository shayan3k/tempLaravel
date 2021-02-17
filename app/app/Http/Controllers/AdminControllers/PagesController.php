<?php

namespace App\Http\Controllers\AdminControllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\PagesRequest;
use App\lib\Jdf;
use App\Menu;
use App\Pages;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PagesController extends Controller
{

   public function index()
   {
       if(Gate::allows('view-menu')) {
           $pages = Pages::get();
           return View('admin.pages.index', ['pages' => $pages]);

       }else{
           return redirect('adm-panel/dashboard');
       }

   }


public function create()
{
    if(Gate::allows('add-menu')) {
        return View('admin.pages.create');
    }else{
        return redirect('adm-panel/dashboard');
    }
}


    public function store(PagesRequest $request)
    {
        $pages = new Pages($request->all());


        $pages->date = time();
        if($pages->save())
        {
            alert()->success('برگه مورد نظر با موفقیت ثبت گردید', 'ثبت اطلاعات');
            return redirect()->to(Config::get('global.url').'pages');
        }else{
            alert()->error('لطفا مجددا تلاش فرمایید', 'خطا اطلاعات');
            return redirect()->back();

        }
    }



    public function edit($id)
    {
        if(Gate::allows('edit-menu')) {
            $row = Pages::find($id);
            if ($row) {
                return View('admin.pages.update', ['row' => $row]);
            } else {
                return redirect()->back();
            }
        }else{
            return redirect()->back();
        }
    }



public function update(PagesRequest $request,$id)
{
    $page = Pages::find($id);
    $page->fill($request->all());

    if($page->update())
    {
        alert()->success('برگه مورد نظر با موفقیت ویرایش گردید', 'ویرایش اطلاعات');
        return redirect()->to(Config::get('global.url').'pages');


    }else{


        alert()->error('لطفا مجددا تلاش فرمایید', 'خطا اطلاعات');
        return redirect()->back();
    }
}







    public function delete(Request $request)
    {

            $page_id = $request->get('page_id');
            $page = Pages::find($page_id);

            foreach ($page->get_menu as $key => $value) {
                Menu::where('id', $value->id)->delete();
            }
            Pages::where('id', $page_id)->delete();
        alert()->success('برگه مورد نظر با موفقیت حذف گردید', 'حذف اطلاعات');
        return redirect()->back();

    }
}
