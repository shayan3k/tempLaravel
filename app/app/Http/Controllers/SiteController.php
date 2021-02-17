<?php

namespace App\Http\Controllers;

use App\Experts;
use App\Http\Requests\UsersRequest;
use App\lib\Jdf;
use App\MainSetting;
use App\Menu;
use App\News;
use App\Question;
use App\Services;
use App\Slider;
use App\Statistics;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use \SoapClient;
use Mail;
class SiteController extends Controller
{

    public function index(Request $request)
    {
        $this->statistic($request->ip());
        $slider= Slider::orderBy('id','desc')->get();
        $experts  = Experts::get();
        $news  = News::orderBy('id','desc')->limit(3)->get();
        return view('index',['slider'=>$slider,'experts'=>$experts,'news'=>$news]);
    }
    public function statistic($ip)
    {

        $jdf = new Jdf();
        $time = time();
        $year = $this->Convertnumber2english($jdf->jdate("Y"));
        $month = $this->Convertnumber2english($jdf->jdate("n"));
        $day = $this->Convertnumber2english($jdf->jdate("j"));
        $statistic = new Statistics();
        $statistic->year = $year;
        $statistic->month = $month;
        $statistic->day = $day;
        $statistic->ip = $ip;
        $statistic->time = $time;
        $statistic->save();

    }
    function Convertnumber2english($srting) {

        $srting = str_replace('۰', '0', $srting);
        $srting = str_replace('۱', '1', $srting);
        $srting = str_replace('۲', '2', $srting);
        $srting = str_replace('۳', '3', $srting);
        $srting = str_replace('۴', '4', $srting);
        $srting = str_replace('۵', '5', $srting);
        $srting = str_replace('۶', '6', $srting);
        $srting = str_replace('۷', '7', $srting);
        $srting = str_replace('۸', '8', $srting);
        $srting = str_replace('۹', '9', $srting);

        return $srting;
    }


    public function faq()
    {
        $faq = Question::get();
        $news  = News::orderBy('id','desc')->limit(3)->get();
        return View('faq.index',['faq'=>$faq,'news'=>$news]);
    }
    public function services()
    {
        $services = Services::get();
        return View('services.index',['services'=>$services]);
    }
    public function news(Request $request)
    {
        $news = News::select('*');
        if($request->has('q'))
        {
            $news->where('title','like','%'.$request->get('q').'%');
        }
        $news = $news->orderBy('id','desc')->paginate(4);
        return View('news.index',['news'=>$news]);
    }

    public function news_show($url)
    {
        $news=  News::where('title_url',$url)->first();
        $news_list = News::where('title_url','!=',$url)->orderBy('id','desc')->limit(3)->get();
        if($news)
        {
            return View('news.show',['news'=>$news,'news_list'=>$news_list]);
        }else{
            abort('404');
        }
    }


    public function page($url)
    {
            $menu = Menu::where('url',$url)->first();

            if($menu)
            {
                return View('page.index',['menu'=>$menu]);
            }
            else
                {
                abort('404');
            }



    }



    public function register()
    {

        return View('register.index');
    }

    public function RegistrationPost(UsersRequest $request)
    {
        if($request->has('verify'))
        {
            $username = $request->get('username');
            $user = new User($request->all());
            $user->old_password = $request->get('password');
            $user->active_code  = rand(999,10000);
            $user->password = Hash::make($user->old_password);
            $user->date = time();
            $user->role = 'user';
            if($user->save())
            {
                $this->sms($username,$request->get('lname'),$user->active_code);
                Session::put('login_number',$username);
                return redirect()->back();
            }
        }else{
            return redirect()->back();
        }




    }
    public function sms($phone,$name,$code)
    {

        $main = MainSetting::first();
        $client = new SoapClient("http://188.0.240.110/class/sms/wsdlservice/server.php?wsdl");
        $user = $main->username_sms;
        $pass = $main->password_sms;
        $fromNum = $main->num_sms;
        $toNum = array($phone);
        $pattern_code = "hoq9kl1li0";
        $input_data = array("name" => $name,"code" => $code);
        $client ->sendPatternSms($fromNum, $toNum, $user, $pass, $pattern_code, $input_data);
        return 1;

    }

    public function verify(Request $request)
    {
        $message = [
            'active.required'=>'کد تایید نمی تواند خالی باشد.',
            'active.numeric'=>'کد تایید می بایست از نوع عدد باشد.',
        ];
        $this->validate($request, [
            'active' => 'required|numeric',
        ], $message);

        $user = User::where('active_code',$request->get('active'))->first();
        if($user)
        {
         $user->update(['status'=>1]);
         Session::forget('login_number');
         return redirect('login');
        }
        else{
            return redirect()->back()->with('errors',1);
        }


    }

public function forget()
{
    return View('forget.index');
}

public function forget_post(Request $request)
{
    $message = [
        'username.required'=>'شماره همراه نمی تواند خالی باشد.',
        'username.numeric'=>'شماره همراه می بایست از نوع عدد باشد.',
        'username.digits'=>'شماره همراه می بایست 11 رقمی باشد.',
    ];
    $this->validate($request, [
        'username' => 'required|numeric|digits:11',
    ], $message);

    $user = User::where('username',$request->get('username'))->first();
    if($user)
    {
        $digits = 7;
        $number =  rand(pow(10, $digits-1), pow(10, $digits)-1);
        $user->update(['password'=>Hash::make($number),'old_password'=>$number]);
        $this->sms_password($user->username,$number);
        return redirect('login')->with('send',1);
    }else
    {
        return redirect()->back()->with('errors',1);
    }

}

    public function sms_password($phone,$code)
    {

        $main = MainSetting::first();
        $client = new SoapClient("http://188.0.240.110/class/sms/wsdlservice/server.php?wsdl");
        $user = $main->username_sms;
        $pass = $main->password_sms;
        $fromNum = $main->num_sms;
        $toNum = array($phone);
        $pattern_code = "9g9btretti";
        $input_data = array("code" => $code);
        $client ->sendPatternSms($fromNum, $toNum, $user, $pass, $pattern_code, $input_data);
        return 1;

    }

    public function wallet()
    {
        return View('user.wallet');
    }

    public function code(Request $request)
    {
        if($request->hasFile('img'))
        {
            $filename =  time().'.'.$request->file('img')->getClientOriginalExtension();
            if($request->file('img')->move('resources/upload/code',$filename))
            {
               DB::table('user_code')->insert(['user_id'=>Auth::user()->id,'img_code'=>$filename]);
               return redirect('profile/wallet');
            }
        }
    }


    public function contact()
    {
        return View('contact.index');
    }
    public function contact_post(Request $request)
    {
        $fname = $request->get('fname');
        $lname = $request->get('lname');
        $subject = $request->get('subject');
        $email = $request->get('email');
        $messages = $request->get('message');
        ini_set('max_execution_time', 380);
        $data = [
            'fname'=>$fname,
            'lname'=>$lname,
            'subject'=>$subject,
            'email' => $email,
            'message'=>$messages
        ];
        Mail::send( 'layouts.contact',["data"=>$data] , function ($message) {
            $message->to('info@unionarz.com')->subject('تماس با ما');
        });
        return redirect()->back()->with('send',1);
    }


}
