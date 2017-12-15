<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public $primaryKey ='empId';
    protected $fillable =[
    	'Name',
    	'Address',
    	'Email_Address',
    	'Telephone',
    	'Mobile',
    	'Additional_Information',
    	'checkValue',
        'paymentStatus',
    	'amount',
        'bId',
    ];
    public $timestamps = true;

    public function payslips()
    {
        return $this->belongsTo('App\Models\payslips');
    }
}
