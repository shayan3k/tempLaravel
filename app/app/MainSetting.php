<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainSetting extends Model
{

    protected $table='main_setting';
    protected $fillable=['service_email','num_terminal','username_terminal','password_terminal','port_email','username_email','password_email','send_mail_paid','num_sms','username_sms','password_sms','send_sms_paid','lat','lon','haml','post','bastebandi'];
    public $timestamps = false;




}
