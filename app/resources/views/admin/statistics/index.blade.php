@extends('layouts.admin')
<?php
$jdf = new \App\lib\Jdf();

/*
$today = $jdf->jmktime(12,0,0,$jdf->jdate("n"),$jdf->jdate("j"),$jdf->jdate("Y"));
$yesterday_time = time() - 60 * 60 * 24;
$y = $jdf->jdate("Y",$yesterday_time);
$n =  $jdf->jdate("n",$yesterday_time);
$j =  $jdf->jdate("j",$yesterday_time);
$yesterday = $jdf->jmktime(12,0,0,$n,$j,$y);
*/
?>
@section('content')

<div class="row-fluid">
            <div class="span12">

                <h3 class="page-title">
                   پنل مدیریت وب سایت
                            <small> آمارهای بازدید</small>
                </h3>
                <ul class="breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="{{ url('adm-website/dashboard') }}">پیشخوان</a>
                        <i class="fa fa-angle-left"></i>
                    </li>

                    <li><a href="{{ Request::url()  }}">آمارهای بازدید</a></li>

        <li class="pull-left no-text-shadow hidden-phone">
            <div id="dashboard-calender">
                <i class="fa fa-calendar" style="color:white"></i>
امروز  {{ $jdf->jdate("l j  F  Y") }}
            </div>
        </li>
                    </ul>
            </div>
        </div>

<!-- -->


<div id="dashboard">

            <div class="row-fluid">
                <div class="span3 responsive" data-tablet="span6" data-desktop="span3">
                    <div class="dashboard-stat blue">
                        <div class="visual">
                            <i class="fa fa-bar-chart"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                {{ number_format($today_statistic) }}
                                                           </div>
                            <div class="desc">
                                بازدیدهای امروز
                            </div>
                        </div>
                        <a class="more"></a>
                    </div>
                </div>
                <div class="span3 responsive" data-tablet="span6" data-desktop="span3">
                    <div class="dashboard-stat green">
                        <div class="visual">
                            <i class="fa fa-bar-chart"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                {{ number_format($yesterday_statistic) }}
                                                      </div>
                            <div class="desc">بازدیدهای دیروز</div>
                        </div>
                        <a class="more"></a>
                    </div>
                </div>

                <div class="span3 responsive" data-tablet="span6 fix-offset" data-desktop="span3">
                    <div class="dashboard-stat yellow">
                        <div class="visual">
                            <i class="fa fa-bar-chart"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                {{ number_format($month_statistic) }}                           </div>
                            <div class="desc"> بازدیدهای ماه</div>
                        </div>
                        <a class="more"></a>
                    </div>
                </div>

                <div class="span3 responsive" data-tablet="span6" data-desktop="span3">
                    <div class="dashboard-stat purple">
                        <div class="visual">
                            <i class="fa fa-globe"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                               {{ number_format($year_statistic) }}                          </div>
                            <div class="desc"> بازدیدهای سال</div>
                        </div>
                        <a class="more"></a>
                    </div>
                </div>
            </div>
            <!-- END DASHBOARD STATS -->
            <div class="clearfix"></div>

            <!--====================== Monthly Stats Chart =================-->
            <div class="row-fluid">
                <div class="span12">
                    <div class="portlet box green">
                                                <div class="portlet-title">
                            <div class="caption"><i class="fa fa-bar-chart"></i>
                             نمودار بازدیدهای
روزانه
{{ $jdf->jdate("F") }}
سال
{{ $jdf->jdate("Y")  }}
                                 </div>
                        </div>
                        <div class="portlet-body">
                            <div id="monthly-chart" class="chart" style="padding: 0px; position: relative;"><canvas class="flot-base" width="1705" height="450" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1137px; height: 300px;"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 36px; top: 280px; left: 352px; text-align: center;">10</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 36px; top: 280px; left: 390px; text-align: center;">11</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 36px; top: 280px; left: 425px; text-align: center;">12</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 36px; top: 280px; left: 461px; text-align: center;">13</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 36px; top: 280px; left: 498px; text-align: center;">14</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 36px; top: 280px; left: 535px; text-align: center;">15</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 36px; top: 280px; left: 572px; text-align: center;">16</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 36px; top: 280px; left: 608px; text-align: center;">17</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 36px; top: 280px; left: 645px; text-align: center;">18</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 36px; top: 280px; left: 682px; text-align: center;">19</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 36px; top: 280px; left: 719px; text-align: center;">20</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 36px; top: 280px; left: 756px; text-align: center;">21</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 36px; top: 280px; left: 792px; text-align: center;">22</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 36px; top: 280px; left: 828px; text-align: center;">23</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 36px; top: 280px; left: 865px; text-align: center;">24</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 36px; top: 280px; left: 902px; text-align: center;">25</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 36px; top: 280px; left: 939px; text-align: center;">26</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 36px; top: 280px; left: 975px; text-align: center;">27</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 36px; top: 280px; left: 1012px; text-align: center;">28</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 36px; top: 280px; left: 1049px; text-align: center;">29</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 36px; top: 280px; left: 1086px; text-align: center;">30</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 36px; top: 280px; left: 1124px; text-align: center;">31</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 36px; top: 280px; left: 21px; text-align: center;">01</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 36px; top: 280px; left: 56px; text-align: center;">02</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 36px; top: 280px; left: 92px; text-align: center;">03</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 36px; top: 280px; left: 129px; text-align: center;">04</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 36px; top: 280px; left: 166px; text-align: center;">05</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 36px; top: 280px; left: 204px; text-align: center;">06</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 36px; top: 280px; left: 239px; text-align: center;">07</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 36px; top: 280px; left: 276px; text-align: center;">08</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 36px; top: 280px; left: 314px; text-align: center;">09</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div class="flot-tick-label tickLabel" style="position: absolute; top: 265px; left: 15px; text-align: right;">0</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 236px; left: 7px; text-align: right;">50</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 206px; left: 6px; text-align: right;">100</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 177px; left: 4px; text-align: right;">150</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 147px; left: 4px; text-align: right;">200</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 118px; left: 2px; text-align: right;">250</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 88px; left: 2px; text-align: right;">300</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 59px; left: 0px; text-align: right;">350</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 29px; left: 3px; text-align: right;">400</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 0px; left: 1px; text-align: right;">450</div></div></div><canvas class="flot-overlay" width="1705" height="450" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1137px; height: 300px;"></canvas><div class="legend"><div style="position: absolute; width: 103px; height: 43px; top: 15px; right: 13px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div><table style="position:absolute;top:15px;right:13px;;font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(209,38,16);overflow:hidden"></div></div></td><td class="legendLabel">کل بازدیدها</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(55,183,243);overflow:hidden"></div></div></td><td class="legendLabel">بازدید کنندگان یکتا</td></tr></tbody></table></div></div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====================== Yearly Stats Chart =====================-->
            <div class="row-fluid">
                <div class="span12">
                    <div class="portlet box purple">
                                                <div class="portlet-title">
                            <div class="caption"><i class="fa fa-bar-chart"></i>
                             نمودار بازدیدهای سالانه -
سال
{{ $jdf->jdate("Y") }}

                                 </div>
                        </div>
                        <div class="portlet-body">
                            <div id="yearly-chart" class="chart" style="padding: 0px; position: relative;"><canvas class="flot-base" width="1705" height="450" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1137px; height: 300px;"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 94px; top: 280px; left: 18px; text-align: center;">فروردین</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 94px; top: 280px; left: 112px; text-align: center;">اردیبهشت</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 94px; top: 280px; left: 219px; text-align: center;">خرداد</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 94px; top: 280px; left: 324px; text-align: center;">تیر</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 94px; top: 280px; left: 416px; text-align: center;">مرداد</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 94px; top: 280px; left: 511px; text-align: center;">شهریور</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 94px; top: 280px; left: 617px; text-align: center;">مهر</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 94px; top: 280px; left: 714px; text-align: center;">آبان</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 94px; top: 280px; left: 814px; text-align: center;">آذر</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 94px; top: 280px; left: 912px; text-align: center;">دی</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 94px; top: 280px; left: 1006px; text-align: center;">بهمن</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 94px; top: 280px; left: 1103px; text-align: center;">اسفند</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div class="flot-tick-label tickLabel" style="position: absolute; top: 265px; left: 25px; text-align: right;">0</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 227px; left: 7px; text-align: right;">5000</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 189px; left: 6px; text-align: right;">10000</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 151px; left: 4px; text-align: right;">15000</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 114px; left: 4px; text-align: right;">20000</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 76px; left: 2px; text-align: right;">25000</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 38px; left: 2px; text-align: right;">30000</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 0px; left: 0px; text-align: right;">35000</div></div></div><canvas class="flot-overlay" width="1705" height="450" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1137px; height: 300px;"></canvas><div class="legend"><div style="position: absolute; width: 103px; height: 43px; top: 15px; right: 27px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div><table style="position:absolute;top:15px;right:27px;;font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(209,38,16);overflow:hidden"></div></div></td><td class="legendLabel">کل بازدیدها</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(55,183,243);overflow:hidden"></div></div></td><td class="legendLabel">بازدید کنندگان یکتا</td></tr></tbody></table></div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>






@endsection

@section('header')
@endsection

@section('footer')
<script>
<?php
$array = array(
1=>'فروردین',
2=>'اردیبهشت',
3=>'خرداد',
4=>'تیر',
5=>'مرداد',
6=>'شهریور',
7=>'مهر',
8=>'آبان',
9=>'آذر',
10=>'دی',
11=>'بهمن',
12=>'اسفند'
);
?>
    // Get data for Yearly Visits Chart from php variables
    yearlyPageViewsChartData = [
 <?php
 for($i=1;$i<=12;$i++)
{
$count  = \App\Statistics::where('year',$jdf->jdate("Y"))->where('month',$i)->count();
echo '["'.$array[$i].'",'.$count.'],';
 }
  ?>
];
    yearlyVisitorsChartData = [
 <?php
 for($i=1;$i<=12;$i++)
{
$count  = \App\Statistics::where('year',$jdf->jdate("Y"))->where('month',$i)->groupBy('ip')->get();
echo '["'.$array[$i].'",'.sizeof($count).'],';
 }
  ?>
];
    // Get data for Monthly Visits Chart from php variables
    monthlyPageViewsChartData = [
 <?php
 for($i=1;$i<=31;$i++)
{
$count  = \App\Statistics::where('year',$jdf->jdate("Y"))->where('month',$jdf->jdate("n"))->where('day',$i)->count();
echo '["'.$i.'",'.$count.'],';
 }
  ?>
];
    monthlyVisitorsChartData = [
 <?php
 for($i=1;$i<=31;$i++)
{

$count  = \Illuminate\Support\Facades\DB::table('statistics')->where('year',$jdf->jdate("Y"))->where('month',$jdf->jdate("n"))->where('day',$i)->groupBy('ip')->get();
echo '["'.$i.'",'.sizeof($count).'],';

 }
  ?>
];
    monthlyVisitorsChartMonthName = "{{ $jdf->jdate("F") }}";

</script>
<script src="{{ url('resources/js/theme/yearly-visits-chart.js') }}"></script>
<script src="{{ url('resources/js/theme/monthly-visits-chart.js') }}"></script>

@endsection