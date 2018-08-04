<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class PurchaseOrder extends Model
{
	public $table ='purchaseorder';
    public $primaryKey ='id';
    public $timestamps =false;

     public function user()
    {
       return $this->belongsTo('App\Models\Supplier', 'Supplier');
    }
      public function inventoryItem()
    {
   
        return $this->belongsTo('App\Models\Inventory','inventId');
    }
}
