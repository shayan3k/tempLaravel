<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{

    protected $table='coin';
    protected $fillable=['title','img'];
    public $timestamps = false;



}
