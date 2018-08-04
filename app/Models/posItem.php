<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class posItem extends Model
{
     public $table='pos-items';
    public $primaryKey='pos-saleid';
    public $timestamps=false;

    public function inventory(){
    	return $this->belongsTo('App\Models\inventory','Item');
    }
}
