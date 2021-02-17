<?php

namespace App\Http\Controllers\AdminControllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use App\lib\Jdf;
use Illuminate\Support\Facades\Gate;
use Image;

class NewsController extends Controller
{

   public function index()
   {

       if(Gate::allows('view-news')) {
       $news= News::orderBy('date','desc')->paginate(10);
       return View('admin.news.index',['news'=>$news,'page'=>true]);
       }else{
           return redirect('adm-panel/dashboard');
       }


   }



    public function create()
    {

        if(Gate::allows('add-news')) {
        return View('admin.news.create');
        }else{
            return redirect('adm-panel/dashboard');
        }
    }




    public function store(NewsRequest $request)
    {
        $news = new News($request->all());

        $url  = str_replace('-','',$news->title);
        $url = str_replace('/','',$url);
        $news->title_url  = preg_replace('/\s+/','-',$url);
        $news->date = time();
        if($request->hasFile('img'))
        {
            $filename =  time().'.'.$request->file('img')->getClientOriginalExtension();
            if($request->file('img')->move('resources/upload/news',$filename))
            {
                $news->img = $filename;
            }
        }

        if($news->save())
        {

            alert()->success('خبر مورد نظر با موفقیت ثبت گردید', 'ثبت اطلاعات');
            return redirect()->to(Config::get('global.url').'news');

        }
        else
        {
            alert()->error('لطفا مجددا تلاش فرمایید', 'خطا اطلاعات');
            return redirect()->back();
        }

    }




    public function destroy($id)
    {

        $news = News::find($id);
        if(file_exists('resources/upload/news/'.$news->img))
        {
            unlink('resources/upload/news/'.$news->img);
        }
        $news->delete();
        alert()->success('خبر مورد نظر با موفقیت حذف گردید', 'حذف اطلاعات');
        return redirect()->back();

    }





public function edit($id)
{
    if(Gate::allows('edit-news')) {
    $row = News::findOrFail($id);
    return View('admin.news.update', ['row' => $row]);
    }else{
        return redirect('adm-panel/dashboard');
    }
}

    public function update(NewsRequest $request,$id)

    {

        $row = News::find($id);
        $row->fill($request->all());

        $url = str_replace('-', '', $request->get('title'));
        $url = str_replace('/', '', $url);
        $row->title_url = preg_replace('/\s+/', '-', $url);

        if($request->hasFile('img'))
        {
            $filename =  time().'.'.$request->file('img')->getClientOriginalExtension();
            if($request->file('img')->move('resources/upload/news',$filename))
            {
                $row->img = $filename;
            }
        }
        if($row->update())
        {

            alert()->success('خبر مورد نظر با موفقیت ویرایش گردید', 'ویرایش اطلاعات');
            return redirect()->to(Config::get('global.url').'news');

        }else{
            alert()->error('لطفا مجددا تلاش فرمایید', 'خطا اطلاعات');
            return redirect()->back();
        }

            }






}
