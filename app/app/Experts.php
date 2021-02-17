<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experts extends Model
{

    protected $table='experts';
    protected $fillable=['name','facebook','googleplus','twitter','role'];
    public $timestamps = false;




}
