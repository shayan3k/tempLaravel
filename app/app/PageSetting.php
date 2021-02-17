<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageSetting extends Model
{

    protected $table='page_setting';
    protected $fillable=['size_pic','count_ads','count_plan','count_ads_send'];
    public $timestamps = false;


}
