<?php

namespace App\Models;   			//To reference Models
use Illuminate\Database\Eloquent\Model;

class Payslips extends Model
{
    public $primaryKey ='payId';
    public $fillable =[
    	'pdate',
        'eId',
        'earn_Description',
        'earn_quantity',
        'earn_rate',
        'earn_total',
        'earn_grossPay',
        'dId',
        'ded_Description',
        'ded_amount',
        'deduct_total',
        'deduct_netPay',
        'cId',
        'econt_Description',
        'econt_amount',
        'econt_total',
        'notes',
    ];

    public $timestamps = false; // for false updated_at and created_at

    public function employees()
    {
        return $this->hasMany('App\Models\Employee');
    }

    public function pearnitems()
    {
        return $this->hasMany('App\Models\pearnitems');
    }
}
