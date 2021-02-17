<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SectionFourSetting extends Model
{

    protected $table='section_four';
    protected $fillable=['txt_user','txt_news'];
    public $timestamps = false;




}
