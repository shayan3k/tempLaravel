<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{

    protected $table='pages';
    protected $fillable=['title','content','date'];
    public $timestamps = false;

    public function get_menu()
    {
        return $this->hasMany('App\Menu','page_id','id');
    }




}
