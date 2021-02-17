<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SectionTwoSetting extends Model
{

    protected $table='section_two';
    protected $fillable=['txt_one','txt_two','desc_two','btn_val','connect_two'];
    public $timestamps = false;




}
