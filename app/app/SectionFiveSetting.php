<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SectionFiveSetting extends Model
{

    protected $table='section_five';
    protected $fillable=['txt_one','txt_two','btn_val','connect_five'];
    public $timestamps = false;




}
