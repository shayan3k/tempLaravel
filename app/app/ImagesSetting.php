<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagesSetting extends Model
{

    protected $table='images_setting';
    protected $fillable=['logo','footer','about','services','favicon','page'];
    public $timestamps = false;




}
