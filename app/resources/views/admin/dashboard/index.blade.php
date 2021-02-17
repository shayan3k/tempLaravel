@extends('layouts.admin')
<?php
$jdf = new \App\lib\Jdf();
?>
@section('content')

<div class="row-fluid">
            <div class="span12">

                <h3 class="page-title">
                   پنل مدیریت وب سایت
                            <small>آمارها و ...</small>
                </h3>
                <ul class="breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="{{ url('adm-panel/dashboard') }}">پیشخوان</a>

                    </li>



        <li class="pull-left no-text-shadow hidden-phone">
            <div id="dashboard-calender">
                <i class="fa fa-calendar" style="color:white"></i>
امروز  {{ $jdf->jdate("l j   F  Y") }}
            </div>
        </li>
                    </ul>
            </div>
        </div>

<!-- -->


<div id="dashboard">


<div class="row-fluid ">
                                                    <div class="responsive span6 fix-offset" data-tablet="span6 fix-offset" data-desktop="span6 fix-offset">

                                    <div class="dashboard-stat red">
                                        <div class="visual">
                                            <i class="fa fa-dollar"></i>
                                        </div>
                                        <div class="details">
                                            <?php

                                            $coin = \App\Coin::count();
                                            ?>
                                            <div class="number">
                                                {{ number_format($coin) }}<span class="YEKAN size-18"> مورد</span>                                            </div>
                                            <div class="desc"> کل ارز ها </div>
                                        </div>
                                        <a class="more" href="{{ url('adm-panel/coin') }}" target="_blank">
                                        بیشتر <i class="fa fa-angle-left m-icon-white"></i>
                                        </a>
                                    </div>
                            </div>
                        <div class="responsive span6 fix-offset" data-tablet="span6 fix-offset" data-desktop="span6 fix-offset">
                                <div class="dashboard-stat green">
                                    <div class="visual">
                                        <i class="fa fa-newspaper-o"></i>
                                    </div>
                                    <div class="details">
                                       <?php

                                $new = \App\News::count();
                                        ?>
                                        <div class="number">
                                          {{ number_format($new) }}
                                                                                   </div>
                                        <div class="desc">کل خبر ها</div>
                                    </div>
                                    <a class="more" href="{{ url('adm-panel/news') }}" target="_blank">
                                    بیشتر <i class="fa fa-angle-left m-icon-white"></i>
                                    </a>
                                </div>
                            </div>
                              <div class="responsive span6 fix-offset" data-tablet="span6 fix-offset" data-desktop="span6 fix-offset">
                                <div class="dashboard-stat purple">
                                    <div class="visual">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <?php

                                    $users =\App\User::count();
                                    ?>
                                    <div class="details">
                                        <div class="number">
                                         {{ number_format($users) }}                                 </div>
                                        <div class="desc"> کاربران </div>
                                    </div>
                                   <a class="more" href="{{ url('mamas/users') }}" target="_blank">
                                    بیشتر <i class="fa fa-angle-left m-icon-white"></i>
                                    </a>
                                </div>
                            </div>
    <?php
    $jdf = new \App\lib\Jdf();
    $year = $jdf->jdate("Y");
    $month = $jdf->jdate("n");
    $day = $jdf->jdate("j");


    $today_statistic = \App\Statistics::where('year', $year)->where('month', $month)->where('day', $day)->count();

    ?>
                                                                            <div class="responsive span6 fix-offset" data-tablet="span6" data-desktop="span6 fix-offset">
                                <div class="dashboard-stat yellow">
                                    <div class="visual">
                                        <i class="fa fa-area-chart"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">  {{ number_format($today_statistic) }} </div>
                                        <div class="desc"> بازدید کننده های امروز </div>
                                    </div>
                                    <a class="more" href="#" target="_blank">
                                    بیشتر <i class="fa fa-angle-left m-icon-white"></i>
                                    </a>
                                </div>
                            </div>




<div class="clearfix"></div>





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



</div>


@endsection

@section('footer')

<script>


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
<script src="{{ url('resources/js/theme/monthly-visits-chart.js') }}"></script>
@endsection
