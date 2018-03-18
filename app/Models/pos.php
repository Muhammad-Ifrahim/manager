<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pos extends Model
{
    public $table='pos-sale';
    public $primaryKey='posSaleId';
    public $timestamps=false;

    public function posItems(){
        
    return $this->hasMany('App\Models\posItem','posSaleId');
    }
    public function account(){
    	
    	return $this->belongsTo('App\Models\Tax','Tax');
    }
}
