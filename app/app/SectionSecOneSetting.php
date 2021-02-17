<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SectionSecOneSetting extends Model
{

    protected $table='section_sec_one';
    protected $fillable=['txt_one','txt_two','desc_two','btn_val','connect_two','txt_title','img'];
    public $timestamps = false;




}
