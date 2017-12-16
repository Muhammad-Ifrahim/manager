<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class PayslipReport extends Model
{
    public $primaryKey ='id';
    public $table ='payslipreports';
    protected $fillable =[
    	'From',
    	'To',
    	'Description',
    	'payType',
        'bId',
    ];
    public $timestamps = true;
}