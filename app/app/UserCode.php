<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCode extends Model
{

    protected $table='user_code';
    protected $fillable=['img_code','user_id'];
    public $timestamps = false;




}
