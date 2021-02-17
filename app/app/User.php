<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname','lname','username','date', 'password','old_password','role','status','active_code','verify'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function get_code()
    {
        return $this->hasOne(UserCode::class,'user_id','id');
    }
    public function permissions()
    {
        return $this->belongsToMany('App\Permissions');
    }


    public function hasPermissions($permissions)
    {
        return (boolean) $this->permissions->where('name',$permissions->name)->count();
    }


}
