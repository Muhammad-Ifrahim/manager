<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class payslipSetting extends Model
{
    protected $fillable =[
    	'pdate',
    	'earn_Description',
        'ded_Description',
        'econt_Description',
        'earn_quantity',
        'earn_rate',
        'earn_total',
        'earn_grossPay',
        'deduct_total',
        'deduct_netPay',
        'econt_amount',
        'econt_total',
        'pdate',
        'earn_Description',
    ];
    public $timestamps = true;
}
