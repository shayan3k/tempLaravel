<?php

namespace App\Http\Controllers\AdminControllers;
use App\Http\Controllers\Controller;
use App\lib\Jdf;
use App\Statistics;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StatisticsController extends Controller
{

   public function index()
   {
       if(Gate::allows('view-static')) {
           $jdf = new Jdf();
           $yesterday_time = time() - 60 * 60 * 24;

           $year_before = $jdf->jdate("Y", $yesterday_time);
           $month_before = $jdf->jdate("n", $yesterday_time);
           $day_before = $jdf->jdate("j", $yesterday_time);

           $year = $jdf->jdate("Y");
           $month = $jdf->jdate("n");
           $day = $jdf->jdate("j");


           $today_statistic = Statistics::where('year', $year)->where('month', $month)->where('day', $day)->count();

           $yesterday_statistic = Statistics::where('year', $year_before)->where('month', $month_before)->where('day', $day_before)->count();


           $month_statistic = Statistics::where('year', $year_before)->where('month', $month)->count();


           $year_statistic = Statistics::where('year', $year)->count();


           return View('admin.statistics.index', ['today_statistic' => $today_statistic, 'yesterday_statistic' => $yesterday_statistic, 'month_statistic' => $month_statistic, 'year_statistic' => $year_statistic]);
       }else{
           return redirect('adm-panel/dashboard');
       }


   }






}
