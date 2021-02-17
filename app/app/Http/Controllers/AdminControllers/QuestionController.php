<?php

namespace App\Http\Controllers\AdminControllers;
use App\Education;
use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionRequest;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;


class QuestionController extends Controller
{

   public function index()
   {

       if(Gate::allows('view-q')) {
       $question= Question::orderBy('id','desc')->paginate(10);
       return View('admin.question.index',['question'=>$question,'page'=>true]);
       }else{
           return redirect('adm-panel/dashboard');
       }


   }



    public function create()
    {
        if(Gate::allows('add-q')) {
        return View('admin.question.create');
        }else{
            return redirect('adm-panel/dashboard');
        }
    }




    public function store(QuestionRequest $request)
    {
        $news = new Question($request->all());

                if($news->save())
                {
                    alert()->success('سوال مورد نظر با موفقیت ثبت گردید', 'ثبت اطلاعات');
                    return redirect()->to(Config::get('global.url').'question');
                }

        else
        {
            alert()->error('لطفا مجددا تلاش فرمایید', 'خطا اطلاعات');
            return redirect()->back();

        }

    }








    public function destroy($id)
    {

        $news = Question::findOrFail($id);
        $news->delete();
        alert()->success('سوال مورد نظر با موفقیت حذف گردید', 'حذف اطلاعات');
        return redirect()->back();

    }





public function edit($id)
{
    if(Gate::allows('edit-q')) {
    $row = Question::findOrFail($id);
    if ($row) {

        return View('admin.question.update', ['row' => $row]);

    } else {
        return redirect()->back();
    }
    }else{
        return redirect('adm-panel/dashboard');
    }

}

    public function update(QuestionRequest $request,$id)

    {

        $row = Question::findOrFail($id);
        $row->fill($request->all());


        if($row->update())
        {

            alert()->success('سوال مورد نظر با موفقیت ویرایش گردید', 'ویرایش اطلاعات');
            return redirect()->to(Config::get('global.url').'question');

        } else{
            alert()->error('لطفا مجددا تلاش فرمایید', 'خطا اطلاعات');
            return redirect()->back();
        }

 }






}
