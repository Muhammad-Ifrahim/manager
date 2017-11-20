<?php

namespace App\Models;   			//To reference Models

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use App\Notifications\ResetPassword as ResetPasswordNotification;

class User extends Authenticatable
{
    use Notifiable;
    protected $fillable =[
    	'name',
    	'password',
    	'email',
    	'customer',
    	'accounts',
    	'inventory',
    	'customer',
    	'employee',
    ];
    public $timestamps = true;

    /**
    * Send the password reset notification.
    *
    * @param  string  $token
    * @return void
    */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}
