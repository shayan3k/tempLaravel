<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SectionThreeSetting extends Model
{

    protected $table='section_three';
    protected $fillable=['txt_one','icon_one','desc_one','txt_two','icon_two','desc_two','txt_three','icon_three','desc_three','txt_four','icon_four','desc_four'];
    public $timestamps = false;




}
