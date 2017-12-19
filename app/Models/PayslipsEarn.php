<?php

namespace App\Models;   			//To reference Models
use Illuminate\Database\Eloquent\Model;

class PayslipsEarn extends Model
{
    public $primaryKey ='payslipsearnitemid';
    public $table='payslipsearnitems';
    
    public function Earn(){
    	return $this->belongsTo('App\Models\pearnitems', 'Earning');
    }

    public $timestamps = false; // for false updated_at and created_at
}
