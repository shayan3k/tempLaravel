<?php

namespace App\Http\Controllers\AdminControllers;
use App\Advertise;
use App\Coin;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsersRequest;
use App\MainSetting;
use App\Payment;
use App\User;
use App\UserCode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use \SoapClient;
use App\Imports\CsvImport;
use Maatwebsite\Excel\Facades\Excel;
class UsersController extends Controller
{


   public function index()
   {

       if(Gate::allows('view-users')) {
           $users = User::orderBy('id', 'desc')->limit(50)->get();
           $role = array(
               'admin' => 'مدیر ارشد',
               'user' => 'کاربر عادی'
           );
           $status = array(
               1 => 'فعال',
               2 => 'غیر فعال'
           );

           return View('admin.users.index', ['users' => $users, 'role' => $role, 'status' => $status]);

       }else{
           return redirect('adm-panel/dashboard');
       }

   }



    public function create()
    {
        if(Gate::allows('add-users')) {
            return View('admin.users.create');
        }else{
            return redirect('adm-panel/dashboard');
        }

    }

    public function store(UsersRequest $request)
    {

      $user = new User($request->all());
      $user->old_password = $request->get('password');
      $user->password = Hash::make($user->old_password);
      $user->date = time();
      $user->status  = ($request->has('status')) ? $request->get('status') : 0;
      if($user->save())
      {
          alert()->success('کاربر مورد نظر با موفقیت ثبت گردید', 'ثبت اطلاعات');
          return redirect()->to(Config::get('global.url').'users');

      }else
      {
          alert()->error('لطفا مجددا تلاش فرمایید', 'خطا اطلاعات');
          return redirect()->back();
      }

    }

    public function edit($id)
    {
        if(Gate::allows('edit-users')) {
        $row = User::findOrFail($id);
        return View('admin.users.update',['row'=>$row]);
        }else{
            return redirect('adm-panel/dashboard');
        }
    }

    public function update(Request $request,$id)
    {
    $row = User::findOrFail($id);
    $row->fill($request->except('password'));
    $row->fname = $request->get('fname');
    $row->lname = $request->get('lname');
    if(!empty($request->get('password')))
    {
        $row->old_password  = $request->get('password');
        $row->password = Hash::make($row->old_password);
    }
        $row->status  = ($request->has('status')) ? $request->get('status') : 0;
        $row->role = $request->get('role');

        if($row->update())
        {
            alert()->success('کاربر مورد نظر با موفقیت ویرایش گردید', 'ثبت اطلاعات');
            return redirect()->to(Config::get('global.url').'users');

        }else
        {
            alert()->error('لطفا مجددا تلاش فرمایید', 'خطا اطلاعات');
            return redirect()->back();
        }



    }

    public function destroy($id)
    {
            User::where('id', $id)->delete();
            UserCode::where('user_id',$id)->delete();
            alert()->success('کاربر مورد نظر با موفقیت حذف گردید', 'حذف اطلاعات');
            return redirect()->back();
    }


    public function verify($id)
    {
        $user = User::findOrFail($id);
        $user->update(['verify'=>1]);
        alert()->success('حساب کاربری مورد نظر با موفقیت تایید گردید', 'ثبت اطلاعات');
        $this->sms($user->username,$user->lname);
        return redirect()->back();
    }
    public function sms($phone,$name)
    {

        $main = MainSetting::first();
        $client = new SoapClient("http://188.0.240.110/class/sms/wsdlservice/server.php?wsdl");
        $user = $main->username_sms;
        $pass = $main->password_sms;
        $fromNum = $main->num_sms;
        $toNum = array($phone);
        $pattern_code = "gbz7faq6yd";
        $input_data = array("name" => $name);
        $client ->sendPatternSms($fromNum, $toNum, $user, $pass, $pattern_code, $input_data);
        return 1;

    }

    public function wallet($id)
    {
        if(Gate::allows('view-wallet')) {
        $user = User::findOrFail($id);
        $coin = Coin::get();
        return View('admin.users.wallet',['user'=>$user,'coin'=>$coin]);
        }else{
            return redirect('adm-panel/dashboard');
        }
    }
    public function wallet_post(Request $request,$id)
    {
        $item = $request->get('item');
        DB::table('wallet_user')->where(['user_id'=>$id])->delete();
        foreach ($item as $key=>$value)
        {

        DB::table('wallet_user')->insert([
           'user_id'=>$id,
            'money'=>$value,
            'coin_id'=>$key
        ]);

        }

        alert()->success('کیف پول مورد نظر با موفقیت ثبت گردید', 'ثبت اطلاعات');
        return redirect()->to(Config::get('global.url').'users');

    }

 public function excel()
    {
     return Excel::download(new CsvImport(), 'users.xlsx');
    }


    public function access($id)
    {
        if(Gate::allows('role-users')) {
        $user=  User::findOrFail($id);
        return View('admin.users.access',['user'=>$user]);
        }else{
            return redirect('adm-panel/dashboard');
        }
    }


    public function access_post(Request $request,$id)
    {
        DB::table('permissions_user')->where('user_id',$id)->delete();
        $permissions = $request->get('per_user');
        if(is_array($permissions) and !empty($permissions)){
            foreach($permissions as $key=>$value)
            {
                DB::table('permissions_user')->insert(['user_id'=>$id,'permissions_id'=>$value]);
            }
        }
        return redirect('adm-panel/users')->with('save', 'اطلاعات با موفقیت ویرایش گردید.');

    }





    public function profile()
    {
        
        $user=  Auth::user();
    return View('admin.users.profile',['row'=>$user]);
    }


  public function profile_post(Request $request)
    {
        
          $message = [
          'fname.required'=>'وارد کردن نام  الزامی است.'  ,
           'lname.required'=>'وارد کردن نام خانوادگی  الزامی است.'  ,
    
          'username.required'=>'وارد کردن نام کاربری الزامی است.'  ,
          'username.unique'=>'نام کاربری از قبل ثبت شده است.' ,
    
         
        ];
        $this->validate($request, [
            'fname' => 'required|string',
        
               'lname' => 'required|string', 
            'username'=>'required|unique:users,username,'.Auth::user()->id
        ],$message);

        
        
    $row = User::findOrFail(Auth::user()->id);
    $row->fill($request->except('password'));
    $row->fname = $request->get('fname');
    $row->lname = $request->get('lname');
    if(!empty($request->get('password')))
    {
        $row->old_password  = $request->get('password');
        $row->password = Hash::make($row->old_password);
    }
        $row->update();
      return redirect()->back();
    
    }









}
