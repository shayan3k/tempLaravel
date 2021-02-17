<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{

    protected $table='service';
    protected $fillable=['title','img','desc_low','desc_high','status'];
    public $timestamps = false;



}
