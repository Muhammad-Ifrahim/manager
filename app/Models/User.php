<?php

namespace App\Models;   			//To reference Models
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable =[
    	'customer',
    	'accounts',
    	'inventory',
    	'customer',
    	'employee',

    ];
    public $timestamps = true;
}
