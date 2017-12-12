<?php

namespace App\Models;   			//To reference Models
use Illuminate\Database\Eloquent\Model;

class PayslipsContribute extends Model
{
    public $primaryKey ='payslipscontributeitemsid';
    public $table='payslipscontributeItems';

    public function Contribute(){
    	return $this->belongsTo('App\Models\pContributeItems', 'Contribution');
    }

    public $timestamps = false; // for false updated_at and created_at
}
