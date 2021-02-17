<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{

    protected $table='permissions';
    protected $fillable=['name','label','module_id'];
    public $timestamps = false;


    public function users()
    {
        return $this->belongsToMany('App\User');
    }


}
