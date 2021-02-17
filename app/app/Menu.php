<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{

    protected $table='menu';
    protected $fillable=['title','page_id','type_menu','link','position','status','blink'];
    public $timestamps = false;

    public function get_cat()
    {
        return $this->hasOne('App\Pages','id','page_id');
    }


}
