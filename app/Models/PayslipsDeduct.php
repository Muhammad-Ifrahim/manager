<?php

namespace App\Models;   			//To reference Models
use Illuminate\Database\Eloquent\Model;

class PayslipsDeduct extends Model
{
    public $primaryKey ='payslipsdeductitemsid';
    public $table='payslipsdeductitems';

    public function Deduct(){
    	return $this->belongsTo('App\Models\pDeductItems', 'Deduction');
    }

    public $timestamps = false; // for false updated_at and created_at
}
