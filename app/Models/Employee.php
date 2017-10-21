<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable =[
    	'Name',
    	'Address',
    	'Email_Address',
    	'Telephone',
    	'Mobile',
    	'Additional_Information',
    	'amount_to_pay',
    	'advance_paid',
    ];
    public $timestamps = true;
}
