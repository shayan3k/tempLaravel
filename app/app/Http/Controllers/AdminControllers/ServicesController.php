<?php

namespace App\Http\Controllers\AdminControllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServicesRequest;
use App\Services;
use App\ServicesTab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Image;

class ServicesController extends Controller
{

   public function index()
   {

       if(Gate::allows('view-services')) {
       $services= Services::orderBy('id','desc')->paginate(10);
       return View('admin.services.index',['service'=>$services,'page'=>true]);
       }else{
           return redirect('adm-panel/dashboard');
       }


   }



    public function create()
    {

        if(Gate::allows('add-services')) {
        return View('admin.services.create');
        }else{
            return redirect('adm-panel/dashboard');
        }
    }




    public function store(ServicesRequest $request)
    {
        $services  = new Services($request->all());
        if($request->hasFile('img'))
        {
            $filename =  time().'.'.$request->file('img')->getClientOriginalExtension();
            if($request->file('img')->move('resources/upload/services',$filename))
            {
                $services->img = $filename;
            }
        }
        $services->status  = ($request->has('status')) ? $request->get('status') : 0;
        if($services->save())
        {

            alert()->success('خدمت مورد نظر با موفقیت ثبت گردید', 'ثبت اطلاعات');
            return redirect()->to(Config::get('global.url').'services');
        }
        else
        {
            alert()->error('لطفا مجددا تلاش فرمایید', 'خطا اطلاعات');
            return redirect()->back();
        }


    }


    public function destroy($id)
    {

        $services = Services::findOrFail($id);


            if(file_exists(url('resources/upload/services/'.$services->img)))
            {
                unlink('resources/upload/services/'.$services->img);
            }

        $services->delete();

        alert()->success('خدمت مورد نظر با موفقیت حذف گردید', 'حذف اطلاعات');
        return redirect()->back();

    }





    public function edit($id)
    {
        if(Gate::allows('edit-services')) {
        $row = Services::findOrFail($id);
        return View('admin.services.update', ['row' => $row]);
        }else{
            return redirect('adm-panel/dashboard');
        }
    }

    public function update(ServicesRequest $request,$id)

    {

        $row = Services::find($id);
        $row->fill($request->all());
        if($request->hasFile('img'))
        {
            $filename =  time().'.'.$request->file('img')->getClientOriginalExtension();
            if($request->file('img')->move('resources/upload/services',$filename))
            {
                $row->img = $filename;
            }
        }
        $row->status  = ($request->has('status')) ? $request->get('status') : 0;

        if($row->update())
        {

            alert()->success('خدمت مورد نظر با موفقیت ویرایش گردید', 'ویرایش اطلاعات');
            return redirect()->to(Config::get('global.url').'services');
        }
        else
        {
            alert()->error('لطفا مجددا تلاش فرمایید', 'خطا اطلاعات');
            return redirect()->back();
        }

 }



}
