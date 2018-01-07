<?php

namespace App\Models;   			//To reference Models
use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
	public $primaryKey='id';
    public $table = 'saleitems';  
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
