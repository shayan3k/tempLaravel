<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SingleSetting extends Model
{

    protected $table='single_setting';
    protected $fillable=['title','phone','address','email','txt_main','txt_second','txt_main2','txt_second2','copyright','keywords','desc','facebook','twitter','instagram','telegram','footer','about_fa','terms','complaints'];
    public $timestamps = false;




}
