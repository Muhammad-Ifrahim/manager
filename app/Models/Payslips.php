<?php

namespace App\Models;   			//To reference Models
use Illuminate\Database\Eloquent\Model;

class Payslips extends Model
{
    public $primaryKey ='payId';
    public $fillable =[
    	'pdate',
      
    ];

    public $timestamps = false; // for false updated_at and created_at

   
    public function User(){

     return $this->belongsTo('App\Models\Employee', 'Employee');
    	
    }
     public function PayslipsEarnItem(){

     return $this->HasMany('App\Models\PayslipsEarn', 'payEarnId');
    	
    }

     public function PayslipsDeductItem(){

     return $this->HasMany('App\Models\PayslipsDeduct', 'payId');
    	
    }

     public function PayslipsContributeItem(){

     return $this->HasMany('App\Models\PayslipsContribute', 'payId');
    	
    }

}
