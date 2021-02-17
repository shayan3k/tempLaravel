<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{

    protected $table='news';
    protected $fillable=['title','date','keywords','title_url','desc','img'];
    public $timestamps = false;




}
