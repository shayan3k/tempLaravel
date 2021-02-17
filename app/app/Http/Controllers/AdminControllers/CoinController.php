<?php

namespace App\Http\Controllers\AdminControllers;

use App\Coin;
use App\Http\Controllers\Controller;
use App\Http\Requests\CoinRequest;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Gate;

class CoinController extends Controller
{

    public function index()
    {

        if (Gate::allows('view-coin')) {
            $coin = Coin::orderBy('id', 'desc')->paginate(10);
            return View('admin.coin.index', ['coin' => $coin, 'page' => true]);
        } else {
            return redirect('adm-panel/dashboard');
        }
    }



    public function create()
    {

        if (Gate::allows('add-coin')) {
            return View('admin.coin.create');
        } else {
            return redirect('adm-panel/dashboard');
        }
    }




    public function store(CoinRequest $request)
    {
        $coin  = new Coin($request->all());
        if ($request->hasFile('img')) {
            $filename =  time() . '.' . $request->file('img')->getClientOriginalExtension();
            if ($request->file('img')->move('resources/upload/coin', $filename)) {
                $coin->img = $filename;
            }
        }
        if ($coin->save()) {

            alert()->success('ارز مورد نظر با موفقیت ثبت گردید', 'ثبت اطلاعات');
            return redirect()->to(Config::get('global.url') . 'coin');
        } else {
            alert()->error('لطفا مجددا تلاش فرمایید', 'خطا اطلاعات');
            return redirect()->back();
        }
    }








    public function destroy($id)
    {

        $coin = Coin::findOrFail($id);


        if (file_exists(url('resources/upload/coin/' . $coin->img))) {
            unlink('resources/upload/coin/' . $coin->img);
        }

        $coin->delete();

        alert()->success('ارز مورد نظر با موفقیت حذف گردید', 'حذف اطلاعات');
        return redirect()->back();
    }





    public function edit($id)
    {
        if (Gate::allows('edit-coin')) {
            $row = Coin::findOrFail($id);

            return View('admin.coin.update', ['row' => $row]);
        } else {
            return redirect('adm-panel/dashboard');
        }
    }

    public function update(CoinRequest $request, $id)

    {

        $row = Coin::find($id);
        $row->fill($request->all());
        if ($request->hasFile('img')) {
            $filename =  time() . '.' . $request->file('img')->getClientOriginalExtension();
            if ($request->file('img')->move('resources/upload/coin', $filename)) {
                $row->img = $filename;
            }
        }

        if ($row->update()) {

            alert()->success('ارز مورد نظر با موفقیت ویرایش گردید', 'ویرایش اطلاعات');
            return redirect()->to(Config::get('global.url') . 'coin');
        } else {
            alert()->error('لطفا مجددا تلاش فرمایید', 'خطا اطلاعات');
            return redirect()->back();
        }
    }
}
