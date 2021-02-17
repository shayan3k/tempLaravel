<?php

namespace App\Http\Controllers\AdminControllers;
use App\Experts;
use App\Http\Controllers\Controller;
use App\Http\Requests\ExpertsRequest;
use App\Http\Requests\NewsRequest;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use App\lib\Jdf;
use Image;

class ExpertsController extends Controller
{

   public function index()
   {


       $experts= Experts::orderBy('id','desc')->paginate(10);
       return View('admin.experts.index',['experts'=>$experts,'page'=>true]);



   }



    public function create()
    {
        return View('admin.experts.create');
    }




    public function store(ExpertsRequest $request)
    {
    $experts= new Experts($request->all());
        if($request->hasFile('img'))
        {
            $filename =  time().'.'.$request->file('img')->getClientOriginalExtension();
            if($request->file('img')->move('resources/upload/experts',$filename))
            {
                $experts->img = $filename;
            }
        }

       if($experts->save())
       {
           alert()->success('کارشناس مورد نظر با موفقیت ثبت گردید', 'ثبت اطلاعات');
           return redirect()->to(Config::get('global.url').'experts');
       }
        else{
            alert()->error('لطفا مجددا تلاش فرمایید', 'خطا اطلاعات');
            return redirect()->back();
        }

    }




    public function destroy($id)
    {

        $ex = Experts::find($id);
        if(file_exists('resources/upload/experts/'.$ex->img))
        {
            unlink('resources/upload/experts/'.$ex->img);
        }
        $ex->delete();
        alert()->success('کارشناس مورد نظر با موفقیت حذف گردید', 'حذف اطلاعات');
        return redirect()->back();

    }





public function edit($id)
{

    $row = Experts::findOrFail($id);
    return View('admin.experts.update', ['row' => $row]);
}

    public function update(ExpertsRequest $request,$id)

    {

        $row = Experts::find($id);
        $row->fill($request->all());


        if($request->hasFile('img'))
        {
            $filename =  time().'.'.$request->file('img')->getClientOriginalExtension();
            if($request->file('img')->move('resources/upload/experts',$filename))
            {
                $row->img = $filename;
            }
        }
        if($row->update())
        {

            alert()->success('کارشناس مورد نظر با موفقیت ویرایش گردید', 'ویرایش اطلاعات');
            return redirect()->to(Config::get('global.url').'experts');

        }else{
            alert()->error('لطفا مجددا تلاش فرمایید', 'خطا اطلاعات');
            return redirect()->back();
        }

            }






}
