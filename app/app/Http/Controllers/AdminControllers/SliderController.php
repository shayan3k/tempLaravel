<?php

namespace App\Http\Controllers\AdminControllers;
use App\Category;
use App\Http\Requests\SliderRequest;
use App\Slider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Gate;


class SliderController extends Controller
{

   public function index()
   {

       if(Gate::allows('view-slider')) {
       $slider= Slider::orderBy('id','desc')->get();
       return View('admin.slider.index',['slider'=>$slider]);
       }else{
           return redirect('adm-panel/dashboard');
       }


   }



    public function create()
    {

        if(Gate::allows('add-slider')) {
        return View('admin.slider.create');
        }else{
            return redirect('adm-panel/dashboard');
        }
    }




    public function store(SliderRequest $request)
    {
        $slider = new Slider($request->all());

        if($request->hasFile('img'))
        {
            $filename =  time().'.'.$request->file('img')->getClientOriginalExtension();
            if($request->file('img')->move('resources/upload/slider',$filename))
            {
                $slider->img = $filename;
            }
        }
        if($slider->save())
        {


            alert()->success('اسلایدر مورد نظر با موفقیت ثبت گردید', 'ثبت اطلاعات');
            return redirect()->to(Config::get('global.url').'slider');


        }
        else
        {
            alert()->error('لطفا مجددا تلاش فرمایید', 'خطا اطلاعات');
            return redirect()->back();
        }

    }








    public function destroy($id)
    {

        $slider = Slider::find($id);
        $url = $slider['img'];
        $slider->delete();

        if(file_exists('resources/upload/slider/'.$url))
        {
            unlink('resources/upload/slider/'.$url);
        }

        alert()->success('اسلایدر مورد نظر با موفقیت حذف گردید', 'حذف اطلاعات');
        return redirect()->back();

    }





public function edit($id)
{
    if(Gate::allows('edit-slider')) {
    $row = Slider::find($id);
    if ($row) {

        return View('admin.slider.update', ['row' => $row]);

    } else {
        return redirect()->back();
    }

    }else{
        return redirect('adm-panel/dashboard');
    }
}

    public function update(SliderRequest $request,$id)

    {

        $row = Slider::find($id);
        $row->fill($request->all());
if($request->hasFile('img'))
{
    $filename =  time().'.'.$request->file('img')->getClientOriginalExtension();
    if($request->file('img')->move('resources/upload/slider',$filename))
    {
        $row->img = $filename;
    }
}

        if($row->update())
        {
            alert()->success('اسلایدر مورد نظر با موفقیت ویرایش گردید', 'ویرایش اطلاعات');
            return redirect()->to(Config::get('global.url').'slider');

        }else{
            alert()->error('لطفا مجددا تلاش فرمایید', 'خطا اطلاعات');
            return redirect()->back();
        }

 }




}
