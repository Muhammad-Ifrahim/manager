<?php

namespace App\Models;   			//To reference Models
use Illuminate\Database\Eloquent\Model;

class Proforma extends Model
{
	public $primaryKey='saleqId';
    public $table = 'salesquotes';  
    public $timestamps=false;

    public function reviews()
    {
   
        return $this->belongsTo('Sale');
    }
     public function inventoryItem()
    {
        return $this->belongsTo('App\Models\Inventory','inventId');
    }
}
