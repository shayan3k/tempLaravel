<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    protected $table='question';
    protected $fillable=['title','desc'];
    public $timestamps = false;




}
